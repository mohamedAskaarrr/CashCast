<?php

namespace App\Http\Controllers;
use App\Models\BudgetPlan;
use App\Models\Trend;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

use Illuminate\Http\Request;

class BudgetController extends Controller
{
    //use App\Models\Transaction;

public function dashboard() {
    $user = Auth::user();

    $transactions = Transaction::where('user_id', $user->id)->latest()->get();
    $budgets = BudgetPlan::where('user_id', $user->id)->get();
    $trends = Trend::where('user_id', $user->id)->get();

    return view('dashboard', compact('transactions', 'budgets', 'trends'));
}

}
