<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\InventoryMove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function summary(Request $request)
    {
        $obraId = $request->query('obra_id');

        $totalEstoque = DB::table('estoques')
            ->when($obraId, fn($q) => $q->where('obra_id', $obraId))
            ->sum('quantidade');

        $totalIssues = InventoryMove::when($obraId, fn($q) => $q->where('obra_id', $obraId))
            ->where('type', 'issue')
            ->sum('quantity');

        $totalReturns = InventoryMove::when($obraId, fn($q) => $q->where('obra_id', $obraId))
            ->where('type', 'return')
            ->sum('quantity');

        return [
            'estoque_total' => (int) $totalEstoque,
            'retiradas_total' => (int) $totalIssues,
            'devolucoes_total' => (int) $totalReturns,
        ];
    }

    public function consumption(Request $request)
    {
        $obraId = $request->query('obra_id');
        $since = $request->query('since');

        $query = InventoryMove::select('item_id', DB::raw('sum(quantity) as qty'))
            ->where('type', 'issue')
            ->when($obraId, fn($q) => $q->where('obra_id', $obraId))
            ->when($since, fn($q) => $q->where('created_at', '>=', $since))
            ->groupBy('item_id')
            ->orderByDesc('qty')
            ->with('item');

        return $query->get();
    }
}
