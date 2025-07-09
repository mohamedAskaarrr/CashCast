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
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'transaction_date' => 'required|date',
        ]);

        auth()->user()->transactions()->create($request->all());

        return back()->with('success', 'Transaction added.');
    }
}
