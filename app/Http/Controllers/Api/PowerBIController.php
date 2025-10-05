<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PowerBIController extends Controller
{
    public function embedConfig(Request $request)
    {
        $config = [
            'workspaceId' => env('PBI_WORKSPACE_ID'),
            'reportId' => env('PBI_REPORT_ID'),
            'embedUrl' => env('PBI_EMBED_URL'),
            'accessToken' => env('PBI_EMBED_TOKEN'),
            'expiresAt' => now()->addMinutes(55)->toIso8601String(),
        ];

        if (!$config['workspaceId'] || !$config['reportId'] || !$config['embedUrl'] || !$config['accessToken']) {
            return response()->json(['message' => 'Power BI não configurado'], 503);
        }

        return response()->json($config);
    }

    public function exportDatasetCsv(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        $from = $request->query('from');
        $to = $request->query('to');

        $query = \DB::table('transactions')
            ->select('occurred_on','type','amount','description','account_id','category_id')
            ->where('user_id', $user->id)
            ->when($from, fn($q) => $q->where('occurred_on','>=',$from))
            ->when($to, fn($q) => $q->where('occurred_on','<=',$to))
            ->orderBy('occurred_on');

        $rows = $query->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="transactions.csv"',
        ];

        $callback = function() use ($rows) {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['occurred_on','type','amount','description','account_id','category_id']);
            foreach ($rows as $r) {
                fputcsv($out, [(string)$r->occurred_on, $r->type, $r->amount, $r->description, $r->account_id, $r->category_id]);
            }
            fclose($out);
        };

        return response()->stream($callback, 200, $headers);
    }
}
