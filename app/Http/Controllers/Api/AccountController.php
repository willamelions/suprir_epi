<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        return Account::where('user_id', $user->id)->orderBy('name')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'type' => ['required', Rule::in(['checking', 'savings', 'credit', 'investment', 'cash'])],
            'currency' => ['nullable', 'string', 'size:3'],
            'initial_balance' => ['nullable', 'numeric'],
        ]);
        $data['user_id'] = $user->id;
        $data['currency'] = $data['currency'] ?? 'BRL';
        $account = Account::create($data);
        return response()->json($account, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $account = Account::where('user_id', $user->id)->findOrFail($id);
        return $account;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $account = Account::where('user_id', $user->id)->findOrFail($id);
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:100'],
            'type' => ['sometimes', Rule::in(['checking', 'savings', 'credit', 'investment', 'cash'])],
            'currency' => ['sometimes', 'string', 'size:3'],
        ]);
        $account->update($data);
        return $account;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $account = Account::where('user_id', $user->id)->findOrFail($id);
        $account->delete();
        return response()->json(['message' => 'OK']);
    }
}
