<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Account;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        $query = Transaction::where('user_id', $user->id)->orderByDesc('occurred_on');

        if ($request->filled('account_id')) {
            $query->where('account_id', $request->integer('account_id'));
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->integer('category_id'));
        }
        if ($request->filled('from')) {
            $query->where('occurred_on', '>=', $request->date('from'));
        }
        if ($request->filled('to')) {
            $query->where('occurred_on', '<=', $request->date('to'));
        }

        return $query->paginate(50);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        $data = $request->validate([
            'account_id' => ['required', 'exists:accounts,id'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'type' => ['required', Rule::in(['income', 'expense', 'transfer'])],
            'amount' => ['required', 'numeric'],
            'occurred_on' => ['required', 'date'],
            'description' => ['nullable', 'string', 'max:255'],
            'cleared' => ['sometimes', 'boolean'],
        ]);
        $data['user_id'] = $user->id;
        $transaction = Transaction::create($data);
        return response()->json($transaction, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $tx = Transaction::where('user_id', $user->id)->findOrFail($id);
        return $tx;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $tx = Transaction::where('user_id', $user->id)->findOrFail($id);
        $data = $request->validate([
            'account_id' => ['sometimes', 'exists:accounts,id'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'type' => ['sometimes', Rule::in(['income', 'expense', 'transfer'])],
            'amount' => ['sometimes', 'numeric'],
            'occurred_on' => ['sometimes', 'date'],
            'description' => ['nullable', 'string', 'max:255'],
            'cleared' => ['sometimes', 'boolean'],
        ]);
        $tx->update($data);
        return $tx;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $tx = Transaction::where('user_id', $user->id)->findOrFail($id);
        $tx->delete();
        return response()->json(['message' => 'OK']);
    }
}
