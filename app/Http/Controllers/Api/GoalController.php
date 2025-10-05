<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Goal;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        return Goal::where('user_id', $user->id)
            ->orderBy('target_date')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->attributes->get('auth_user');
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'target_amount' => ['required', 'numeric'],
            'target_date' => ['nullable', 'date'],
            'current_amount' => ['sometimes', 'numeric'],
            'monthly_contribution' => ['sometimes', 'numeric'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);
        $data['user_id'] = $user->id;
        $goal = Goal::create($data);
        return response()->json($goal, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $goal = Goal::where('user_id', $user->id)->findOrFail($id);
        return $goal;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $goal = Goal::where('user_id', $user->id)->findOrFail($id);
        $data = $request->validate([
            'name' => ['sometimes', 'string', 'max:120'],
            'target_amount' => ['sometimes', 'numeric'],
            'target_date' => ['sometimes', 'date'],
            'current_amount' => ['sometimes', 'numeric'],
            'monthly_contribution' => ['sometimes', 'numeric'],
            'category_id' => ['nullable', 'exists:categories,id'],
        ]);
        $goal->update($data);
        return $goal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = $request->attributes->get('auth_user');
        $goal = Goal::where('user_id', $user->id)->findOrFail($id);
        $goal->delete();
        return response()->json(['message' => 'OK']);
    }
}
