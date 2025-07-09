@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
   
<h1>Welcome, {{ auth()->user()->name ?? 'Guest' }}</h1>


    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <h2>Your Transactions</h2>
    @foreach($transactions as $txn)
        <div>
            {{ $txn->transaction_date }} - {{ $txn->description }} - ${{ $txn->amount }}
        </div>
    @endforeach

    <h2>Your Budget Plans</h2>
    @foreach($budgets as $budget)
        <div>
            {{ $budget->month_year }} - ${{ $budget->target_amount }}
        </div>
    @endforeach

    <h2>Predicted Trends</h2>
    @foreach($trends as $trend)
        <div>
            {{ $trend->month_year }} - ${{ $trend->predicted_next_month }}
        </div>
    @endforeach

@endsection
