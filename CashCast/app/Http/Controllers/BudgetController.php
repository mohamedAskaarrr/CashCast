<?php

namespace App\Http\Controllers;
use App\Models\BudgetPlan;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BudgetController extends Controller
{
    /**
     * Display the dashboard (MVP)
     */
    public function dashboard()
    {
        $user = Auth::user();

        // Get user's financial data
        $transactions = $user->transactions()->with('category')->latest()->limit(5)->get();
        $recentTransactions = $transactions; // For the dashboard view
        $budgets = $user->budgetPlans()->with('category')->get();
        
        // Calculate spending for each budget
        foreach ($budgets as $budget) {
            $budget->spent_amount = $user->transactions()
                ->where('type', 'expense')
                ->where('category_id', $budget->category_id)
                ->whereBetween('transaction_date', [$budget->start_date, $budget->end_date])
                ->sum('amount');
        }
        
        // Calculate summary statistics
        $totalIncome = $user->transactions()->where('type', 'income')->sum('amount');
        $totalExpenses = $user->transactions()->where('type', 'expense')->sum('amount');
        $totalBalance = $totalIncome - $totalExpenses;
        
        $monthlyIncome = $user->transactions()
            ->where('type', 'income')
            ->whereMonth('transaction_date', now()->month)
            ->sum('amount');
        
        $monthlyExpenses = $user->transactions()
            ->where('type', 'expense')
            ->whereMonth('transaction_date', now()->month)
            ->sum('amount');

        return view('dashboard-mvp', compact(
            'transactions', 
            'recentTransactions',
            'budgets', 
            'totalBalance',
            'totalIncome',
            'totalExpenses',
            'monthlyIncome',
            'monthlyExpenses'
        ));
    }

    /**
     * Display budgets page (MVP)
     */
    public function index()
    {
        $user = Auth::user();
        $budgets = $user->budgetPlans()->with('category')->get();
        
        // Calculate spending for each budget
        foreach ($budgets as $budget) {
            $budget->spent_amount = $user->transactions()
                ->where('type', 'expense')
                ->where('category_id', $budget->category_id)
                ->whereBetween('transaction_date', [$budget->start_date, $budget->end_date])
                ->sum('amount');
        }
        
        // Calculate totals
        $totalBudget = $budgets->sum('amount');
        $totalSpent = $budgets->sum('spent_amount');
        $remainingBudget = $totalBudget - $totalSpent;
        
        return view('budgets.index', compact('budgets', 'totalBudget', 'totalSpent', 'remainingBudget'));
    }

    /**
     * Show the form for creating a new budget
     */
    public function create()
    {
        $categories = Category::all();
        return view('budgets.create', compact('categories'));
    }

    /**
     * Store a newly created budget in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $user = Auth::user();
        $user->budgetPlans()->create($request->all());

        return redirect()->route('budgets.index')->with('success', 'Budget created successfully!');
    }

    /**
     * Display the specified budget
     */
    public function show(BudgetPlan $budget)
    {
        // Check if user owns this budget
        if ($budget->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $budget->load('category');
        
        // Calculate spending for this budget
        $budget->spent_amount = $budget->user->transactions()
            ->where('type', 'expense')
            ->where('category_id', $budget->category_id)
            ->whereBetween('transaction_date', [$budget->start_date, $budget->end_date])
            ->sum('amount');
        
        // Get related transactions
        $transactions = $budget->user->transactions()
            ->where('category_id', $budget->category_id)
            ->whereBetween('transaction_date', [$budget->start_date, $budget->end_date])
            ->latest()
            ->get();

        return view('budgets.show', compact('budget', 'transactions'));
    }

    /**
     * Show the form for editing the specified budget
     */
    public function edit(BudgetPlan $budget)
    {
        // Check if user owns this budget
        if ($budget->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $categories = Category::all();
        return view('budgets.edit', compact('budget', 'categories'));
    }

    /**
     * Update the specified budget in storage
     */
    public function update(Request $request, BudgetPlan $budget)
    {
        // Check if user owns this budget
        if ($budget->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $budget->update($request->all());

        return redirect()->route('budgets.index')->with('success', 'Budget updated successfully!');
    }

    /**
     * Remove the specified budget from storage
     */
    public function destroy(BudgetPlan $budget)
    {
        // Check if user owns this budget
        if ($budget->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $budget->delete();

        return redirect()->route('budgets.index')->with('success', 'Budget deleted successfully!');
    }

    /**
     * Display reports page
     */
    public function reports()
    {
        $user = Auth::user();
        
        // Monthly data for charts
        $monthlyData = $user->transactions()
            ->selectRaw('MONTH(transaction_date) as month, type, SUM(amount) as total')
            ->whereYear('transaction_date', now()->year)
            ->groupBy('month', 'type')
            ->get();
        
        // Category breakdown
        $categoryData = $user->transactions()
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->selectRaw('categories.name, SUM(amount) as total')
            ->where('type', 'expense')
            ->groupBy('categories.name')
            ->get();
        
        // Recent transactions
        $recentTransactions = $user->transactions()
            ->with('category')
            ->latest()
            ->limit(10)
            ->get();
        
        // Summary stats
        $totalIncome = $user->transactions()->where('type', 'income')->sum('amount');
        $totalExpenses = $user->transactions()->where('type', 'expense')->sum('amount');
        $totalBalance = $totalIncome - $totalExpenses;
        
        return view('reports.index', compact(
            'monthlyData', 
            'categoryData', 
            'recentTransactions',
            'totalIncome',
            'totalExpenses',
            'totalBalance'
        ));
    }
}
