<h1>Welcome, {{ Auth::user()->name }}</h1>

<h2>Your Transactions</h2>
<ul>
    @foreach($transactions as $txn)
        <li>{{ $txn->transaction_date }} - {{ $txn->description }}: ${{ $txn->amount }}</li>
    @endforeach
</ul>

<h2>Budgets</h2>
<ul>
    @foreach($budgets as $budget)
        <li>{{ $budget->month_year }} - Target: ${{ $budget->target_amount }}</li>
    @endforeach
</ul>

<h2>Predicted Trends</h2>
<ul>
    @foreach($trends as $trend)
        <li>{{ $trend->month_year }} - Prediction: ${{ $trend->predicted_next_month }}</li>
    @endforeach
</ul>
