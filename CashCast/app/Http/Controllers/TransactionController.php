<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = auth()->user()->transactions()->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    
public function store(Request $request)
{
    if (!auth()->check()) {
        return redirect('/login');
    }

    $request->validate([
        'description' => 'required',
        'amount' => 'required|numeric',
        'transaction_date' => 'required|date',
    ]);

    $categoryId = $this->classifyCategory($request->description);
    auth()->user()->transactions()->create([
    'description' => $request->description,
    'amount' => $request->amount,
    'transaction_date' => $request->transaction_date,
    'category_id' => $categoryId
    ]);

    return redirect('/dashboard')->with('success', 'Transaction added');
}

private function classifyCategory(string $description)
{
    $keywords = [
        'food' => ['restaurant', 'burger', 'pizza', 'meal'],
        'transport' => ['uber', 'bus', 'train', 'taxi'],
        'rent' => ['apartment', 'rent'],
        'shopping' => ['amazon', 'clothes', 'mall'],
    ];

    foreach ($keywords as $category => $words) {
        foreach ($words as $word) {
            if (str_contains(strtolower($description), $word)) {
                // Make sure to import the Category model at the top of the file:
                // use App\Models\Category;
                return \App\Models\Category::firstOrCreate(['name' => ucfirst($category)])->id;
            }
        }

    return null;
}




}}