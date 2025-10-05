<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InventoryMove;
use App\Services\ProjectionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function summary(Request $request, ProjectionService $projection)
    {
        $user = $request->attributes->get('auth_user');
        $month = $request->query('month');
        $monthDate = $month ? Carbon::parse($month.'-01') : now()->startOfMonth();

        $monthly = $projection->projectMonthlySpending($user->id, $monthDate);
        $byCategory = $projection->projectBudgetByCategory($user->id, $monthDate);

        return [
            'monthly' => $monthly,
            'budgets' => $byCategory,
        ];
    }

    public function consumption(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        $since = $request->query('since');

        $query = DB::table('transactions')
            ->select('category_id', DB::raw('SUM(amount) as spent'))
            ->where('user_id', $user->id)
            ->where('type', 'expense')
            ->when($since, fn($q) => $q->where('occurred_on', '>=', $since))
            ->groupBy('category_id')
            ->orderByDesc('spent');

        return $query->get();
    }
}
