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
        
        return view('budgets.index', compact('budgets', 'totalBudget', 'totalSpent'));
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
     * Store a new budget (MVP)
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0',
            'period' => 'required|in:weekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        Auth::user()->budgetPlans()->create([
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'period' => $request->period,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
            'spent_amount' => 0,
        ]);

        return redirect()->route('budgets.index')->with('success', 'Budget created successfully!');
    }

    /**
     * Display the specified budget
     */
    public function show(BudgetPlan $budget)
    {
        // Ensure the budget belongs to the authenticated user
        if ($budget->user_id !== Auth::id()) {
            abort(403);
        }

        // Get recent transactions for this budget's category
        $recentTransactions = Auth::user()->transactions()
            ->where('type', 'expense')
            ->where('category_id', $budget->category_id)
            ->whereBetween('transaction_date', [$budget->start_date, $budget->end_date])
            ->latest()
            ->limit(5)
            ->get();

        // Calculate current spending
        $budget->spent_amount = Auth::user()->transactions()
            ->where('type', 'expense')
            ->where('category_id', $budget->category_id)
            ->whereBetween('transaction_date', [$budget->start_date, $budget->end_date])
            ->sum('amount');

        return view('budgets.show', compact('budget', 'recentTransactions'));
    }

    /**
     * Show the form for editing the specified budget
     */
    public function edit(BudgetPlan $budget)
    {
        // Ensure the budget belongs to the authenticated user
        if ($budget->user_id !== Auth::id()) {
            abort(403);
        }

        $categories = Category::all();
        return view('budgets.edit', compact('budget', 'categories'));
    }

    /**
     * Update the specified budget
     */
    public function update(Request $request, BudgetPlan $budget)
    {
        // Ensure the budget belongs to the authenticated user
        if ($budget->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0',
            'period' => 'required|in:weekly,monthly,quarterly,yearly',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ]);

        $budget->update([
            'category_id' => $request->category_id,
            'amount' => $request->amount,
            'period' => $request->period,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('budgets.index')->with('success', 'Budget updated successfully!');
    }

    /**
     * Remove the specified budget
     */
    public function destroy(BudgetPlan $budget)
    {
        // Ensure the budget belongs to the authenticated user
        if ($budget->user_id !== Auth::id()) {
            abort(403);
        }

        $budget->delete();

        return redirect()->route('budgets.index')->with('success', 'Budget deleted successfully!');
    }

    /**
     * Display reports page (MVP)
     */
    public function reports(Request $request)
    {
        $user = Auth::user();
        
        // Determine date range based on period
        $period = $request->get('period', 'this_month');
        $startDate = null;
        $endDate = null;
        
        switch ($period) {
            case 'this_month':
                $startDate = now()->startOfMonth();
                $endDate = now()->endOfMonth();
                break;
            case 'last_month':
                $startDate = now()->subMonth()->startOfMonth();
                $endDate = now()->subMonth()->endOfMonth();
                break;
            case 'this_year':
                $startDate = now()->startOfYear();
                $endDate = now()->endOfYear();
                break;
            case 'last_year':
                $startDate = now()->subYear()->startOfYear();
                $endDate = now()->subYear()->endOfYear();
                break;
            case 'custom':
                $startDate = $request->get('start_date') ? Carbon::parse($request->get('start_date')) : now()->startOfMonth();
                $endDate = $request->get('end_date') ? Carbon::parse($request->get('end_date')) : now()->endOfMonth();
                break;
        }
        
        // Get financial data for the period
        $totalIncome = $user->transactions()
            ->where('type', 'income')
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->sum('amount');
            
        $totalExpenses = $user->transactions()
            ->where('type', 'expense')
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->sum('amount');
            
        $netIncome = $totalIncome - $totalExpenses;
        
        $totalTransactions = $user->transactions()
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->count();

        // Get top categories
        $topCategories = $user->transactions()
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('transactions.type', 'expense')
            ->whereBetween('transactions.transaction_date', [$startDate, $endDate])
            ->selectRaw('categories.name, SUM(transactions.amount) as total_amount, COUNT(*) as transactions_count')
            ->groupBy('categories.id', 'categories.name')
            ->orderBy('total_amount', 'desc')
            ->limit(5)
            ->get();

        // Get monthly trend
        $monthlyTrend = $user->transactions()
            ->selectRaw('DATE_FORMAT(transaction_date, "%Y-%m") as month, 
                        DATE_FORMAT(transaction_date, "%M %Y") as month_name,
                        SUM(CASE WHEN type = "income" THEN amount ELSE 0 END) as total_income,
                        SUM(CASE WHEN type = "expense" THEN amount ELSE 0 END) as total_expenses,
                        COUNT(*) as transactions_count')
            ->whereBetween('transaction_date', [$startDate, $endDate])
            ->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();

        return view('reports.index', compact(
            'totalIncome', 
            'totalExpenses', 
            'netIncome',
            'totalTransactions',
            'topCategories',
            'monthlyTrend'
        ));
    }
}
