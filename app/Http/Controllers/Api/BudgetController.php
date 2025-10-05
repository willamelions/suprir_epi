<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budget;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        return Budget::where('user_id', $user->id)
            ->orderByDesc('period')
            ->with('category')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        $data = $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'period' => ['required', 'date'],
            'limit_amount' => ['required', 'numeric'],
            'rollover' => ['sometimes', 'boolean'],
        ]);
        $data['user_id'] = $user->id;
        $budget = Budget::create($data);
        return response()->json($budget, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $budget = Budget::where('user_id', $user->id)->with('category')->findOrFail($id);
        return $budget;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $budget = Budget::where('user_id', $user->id)->findOrFail($id);
        $data = $request->validate([
            'category_id' => ['sometimes', 'exists:categories,id'],
            'period' => ['sometimes', 'date'],
            'limit_amount' => ['sometimes', 'numeric'],
            'rollover' => ['sometimes', 'boolean'],
        ]);
        $budget->update($data);
        return $budget;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $budget = Budget::where('user_id', $user->id)->findOrFail($id);
        $budget->delete();
        return response()->json(['message' => 'OK']);
    }
}
