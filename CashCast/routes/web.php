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

// 🌟 Aurora UI System Demo Route
Route::middleware('auth')->get('/aurora-demo', function () {
    return view('aurora-demo');
})->name('aurora.demo');


Route::post('/transactions', [TransactionController::class, 'store']);




Route::resource('supervisors', SuperVisorController::class)->middleware('role:admin');

Route::get('/supervisor', [SuperVisorController::class, 'index'])->middleware('auth')->name('supervisors.superVisor');


Route::post('supervisors/give-permission', [SuperVisorController::class, 'givePermission'])
    ->middleware('role:admin')
    ->name('supervisors.give-permission');

// Test route to debug permissions
Route::get('/debug-permissions', function() {
    $permissions = \Spatie\Permission\Models\Permission::all();
    $roles = \Spatie\Permission\Models\Role::all();
    
    echo "<h3>Permissions:</h3>";
    foreach($permissions as $p) {
        echo $p->id . ': ' . $p->name . '<br>';
    }
    
    echo "<h3>Roles:</h3>";
    foreach($roles as $r) {
        echo $r->id . ': ' . $r->name . ' - Permissions: ' . $r->permissions->pluck('name')->implode(', ') . '<br>';
    }
})->middleware('auth');


