<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CreditLedger;
use App\Models\Employee;
use App\Models\Estoque;
use App\Models\InventoryMove;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'obra_id' => 'required|integer|exists:obras,id',
            'item_id' => 'required|integer|exists:itens,id',
            'employee_id' => 'required|integer|exists:employees,id',
            'quantity' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($data) {
            $employee = Employee::findOrFail($data['employee_id']);

            $estoque = Estoque::lockForUpdate()
                ->where('obra_id', $data['obra_id'])
                ->where('item_id', $data['item_id'])
                ->firstOrFail();

            if ($estoque->quantidade < $data['quantity']) {
                return response()->json(['message' => 'Estoque insuficiente'], 409);
            }

            // TODO: apply credit/limits rules. For now, skip.

            $estoque->decrement('quantidade', $data['quantity']);

            $move = InventoryMove::create([
                'obra_id' => $data['obra_id'],
                'item_id' => $data['item_id'],
                'employee_id' => $employee->id,
                'quantity' => $data['quantity'],
                'type' => 'issue',
                'reason' => 'api.issue',
            ]);

            return response()->json(['message' => 'OK', 'move' => $move]);
        });
    }

    public function return(Request $request)
    {
        $data = $request->validate([
            'obra_id' => 'required|integer|exists:obras,id',
            'item_id' => 'required|integer|exists:itens,id',
            'employee_id' => 'nullable|integer|exists:employees,id',
            'quantity' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($data) {
            $estoque = Estoque::lockForUpdate()
                ->where('obra_id', $data['obra_id'])
                ->where('item_id', $data['item_id'])
                ->firstOrFail();

            $estoque->increment('quantidade', $data['quantity']);

            $move = InventoryMove::create([
                'obra_id' => $data['obra_id'],
                'item_id' => $data['item_id'],
                'employee_id' => $data['employee_id'] ?? null,
                'quantity' => $data['quantity'],
                'type' => 'return',
                'reason' => 'api.return',
            ]);

            return response()->json(['message' => 'OK', 'move' => $move]);
        });
    }
}
