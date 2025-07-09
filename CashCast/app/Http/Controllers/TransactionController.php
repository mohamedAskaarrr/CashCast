<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        try {
            $transactions = auth()->user()->transactions()->latest()->get();
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Failed to load transactions']);
        }

        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required',
            'transaction_date' => 'required|date',
        ]);

        try {
            auth()->user()->transactions()->create($request->all());
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Failed to add transaction']);
        }

        return back()->with('success', 'Transaction added.');
    }
}
