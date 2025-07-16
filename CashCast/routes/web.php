<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SuperVisorController;

// Redirect root to dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Authentication Routes (MVP)
Route::middleware('guest')->group(function () {
    Route::get('/login', [UsersController::class, 'login'])->name('login');
    Route::post('/login', [UsersController::class, 'doLogin']);
    Route::get('/register', [UsersController::class, 'register'])->name('register');
    Route::post('/register', [UsersController::class, 'doRegister']);
});

Route::post('/logout', [UsersController::class, 'logout'])->name('logout')->middleware('auth');

// Protected Routes (MVP)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [BudgetController::class, 'dashboard'])->name('dashboard');
    
    // Transactions - Full CRUD
    Route::resource('transactions', TransactionController::class);
    
    // Budgets - Full CRUD
    Route::resource('budgets', BudgetController::class);
    
    // Reports
    Route::get('/reports', [BudgetController::class, 'reports'])->name('reports.index');
});

// Admin/Supervisor Routes (MVP)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/supervisor', [SuperVisorController::class, 'index'])->name('supervisor.index');
    Route::resource('supervisors', SuperVisorController::class);
    Route::post('supervisors/give-permission', [SuperVisorController::class, 'givePermission'])
        ->name('supervisors.give-permission');
});


