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

    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        try {
            $user         = auth()->user();
            $transactions = $user->transactions()->latest()->get();
            $budgets      = $user->budgetPlans()->get();
            $trends       = $user->trends()->get();
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to load dashboard data.');
        }

        return view('dashboard', compact('transactions', 'budgets', 'trends'));
    }

    

}
