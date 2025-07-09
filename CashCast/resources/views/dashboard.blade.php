@if (Auth::check())
    <h1>Welcome, {{ Auth::user()->name }}</h1>
@else
    <h1>Welcome</h1>
@endif

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@isset($transactions)
    <h2>Your Transactions</h2>
    <ul>
        @forelse($transactions as $txn)
            <li>{{ $txn->transaction_date }} - {{ $txn->description }}: ${{ $txn->amount }}</li>
        @empty
            <li>No transactions found.</li>
        @endforelse
    </ul>
@endisset

@isset($budgets)
    <h2>Budgets</h2>
    <ul>
        @forelse($budgets as $budget)
            <li>{{ $budget->month_year }} - Target: ${{ $budget->target_amount }}</li>
        @empty
            <li>No budget plans found.</li>
        @endforelse
    </ul>
@endisset

@isset($trends)
    <h2>Predicted Trends</h2>
    <ul>
        @forelse($trends as $trend)
            <li>{{ $trend->month_year }} - Prediction: ${{ $trend->predicted_next_month }}</li>
        @empty
            <li>No trend data available.</li>
        @endforelse
    </ul>
@endisset
