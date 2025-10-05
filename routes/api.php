<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\IssueController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\PowerBIController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\BudgetController;
use App\Http\Controllers\Api\GoalController;

Route::prefix('v1')->group(function () {
    Route::post('auth/login', [AuthController::class, 'login']);
    
    Route::middleware('auth.api')->group(function () {
        Route::post('auth/logout', [AuthController::class, 'logout']);
        Route::get('me', [AuthController::class, 'me']);

        // Employees
        Route::apiResource('employees', EmployeeController::class);

        // Inventory and issue/return
        Route::get('inventory', [InventoryController::class, 'index']);
        Route::post('issues', [IssueController::class, 'store']);
        Route::post('returns', [IssueController::class, 'return']);

        // Reports
        Route::get('reports/summary', [ReportController::class, 'summary']);
        Route::get('reports/consumption', [ReportController::class, 'consumption']);

        // Power BI embedding
        Route::get('powerbi/embed-config', [PowerBIController::class, 'embedConfig']);
        Route::get('powerbi/export/transactions.csv', [PowerBIController::class, 'exportDatasetCsv']);

        // Finance Domain
        Route::apiResource('accounts', AccountController::class);
        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('transactions', TransactionController::class);
        Route::apiResource('budgets', BudgetController::class);
        Route::apiResource('goals', GoalController::class);
    });
});
