@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<h2>Welcome, {{ auth()->user()->name }}</h2>
<x-model>
    <h2>Add Transaction</h2>
    <x-modal>
    <h2>Add Transaction</h2>
    <form id="transaction-form" method="POST" action="/transactions">
    @csrf
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" name="amount" placeholder="Amount" required>
    <input type="date" name="transaction_date" required>
    <button type="submit">Save</button>
</form>

<div id="toast" style="display:none; position:fixed; bottom:1rem; right:1rem; background:#38a169; color:white; padding:1rem; border-radius:6px; z-index:9999;"></div>
</x-modal>

</x-modal>


<div class="card">
    <h3>Your Transactions</h3>
    @forelse($transactions as $txn)
        <div>{{ $txn->transaction_date }} - {{ $txn->description }} - ${{ $txn->amount }}</div>
    @empty
        <p>No transactions yet.</p>
    @endforelse
</div>

<div class="card">
    <h3>Your Budget Plans</h3>
    @forelse($budgets as $budget)
        <div>{{ $budget->month_year }} - Target: ${{ $budget->target_amount }}</div>
    @empty
        <p>No budgets set yet.</p>
    @endforelse
</div>

<div class="card">
    <h3>Predicted Trends</h3>
    @forelse($trends as $trend)
        <div>{{ $trend->month_year }} - ${{ $trend->predicted_next_month }}</div>
    @empty
        <p>No trends yet.</p>
    @endforelse
</div>

<!-- Floating Action Button -->
<a href="#" id="add-btn">＋</a>
@endsection

@push('styles')
<style>
    #add-btn {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 56px;
        height: 56px;
        background-color: #4c51bf;
        color: white;
        font-size: 2rem;
        text-align: center;
        line-height: 56px;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
    }
</style>
@endpush
