<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BudgetController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SuperVisorController;
use Spatie\Permission\Models\Role;

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/login', [UsersController::class, 'doLogin']);
Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/register', [UsersController::class, 'doRegister']);
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/dashboard', [BudgetController::class, 'dashboard']);




Route::post('/transactions', [TransactionController::class, 'store']);




Route::resource('supervisors', SuperVisorController::class)->middleware('role:admin');

Route::get('/supervisor', [SuperVisorController::class, 'index'])->name('supervisors.superVisor');



Route::post('supervisors/give-permission', [SuperVisorController::class, 'givePermission'])
    ->middleware('role:admin')
    ->name('supervisors.give-permission');

