<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Budget;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProjectionService
{
    public function projectMonthlySpending(int $userId, Carbon $month): array
    {
        $start = $month->copy()->startOfMonth();
        $end = $month->copy()->endOfMonth();

        $spent = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->whereBetween('occurred_on', [$start->toDateString(), $end->toDateString()])
            ->sum('amount');

        $income = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->whereBetween('occurred_on', [$start->toDateString(), $end->toDateString()])
            ->sum('amount');

        $daysInMonth = $start->daysInMonth;
        $dayOfMonth = min(now()->day, $daysInMonth);
        $dailyAvgExpense = $dayOfMonth > 0 ? ($spent / $dayOfMonth) : 0;
        $projectedExpense = round($dailyAvgExpense * $daysInMonth, 2);

        return [
            'period' => $start->format('Y-m'),
            'expense_spent' => (float) $spent,
            'income_received' => (float) $income,
            'expense_daily_avg' => (float) $dailyAvgExpense,
            'expense_projected' => (float) $projectedExpense,
        ];
    }

    public function projectBudgetByCategory(int $userId, Carbon $month): array
    {
        $start = $month->copy()->startOfMonth();
        $end = $month->copy()->endOfMonth();

        $budgets = Budget::where('user_id', $userId)
            ->whereDate('period', $start->toDateString())
            ->with('category')
            ->get();

        $spentByCategory = Transaction::select('category_id', DB::raw('SUM(amount) as spent'))
            ->where('user_id', $userId)
            ->where('type', 'expense')
            ->whereBetween('occurred_on', [$start->toDateString(), $end->toDateString()])
            ->groupBy('category_id')
            ->pluck('spent', 'category_id');

        $result = [];
        foreach ($budgets as $budget) {
            $spent = (float) ($spentByCategory[$budget->category_id] ?? 0);
            $remaining = (float) ($budget->limit_amount - $spent);
            $result[] = [
                'category_id' => $budget->category_id,
                'category_name' => optional($budget->category)->name,
                'limit_amount' => (float) $budget->limit_amount,
                'spent' => $spent,
                'remaining' => $remaining,
            ];
        }

        return $result;
    }
}
