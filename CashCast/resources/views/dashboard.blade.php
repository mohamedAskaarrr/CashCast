@extends('layouts.auth')
@section('title', 'Dashboard')

@section('content')
<div class="space-y-6 text-white">
    <h2 class="text-2xl font-semibold mb-4">👋 Welcome, {{ auth()->user()->name }}</h2>




    <!-- Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-gradient-to-br from-purple-700 to-indigo-800 p-4 rounded-xl shadow-md">
            <p class="text-sm text-purple-200">Total Transactions</p>
            <h3 class="text-3xl font-bold">{{ count($transactions) }}</h3>
        </div>
        <div class="bg-gradient-to-br from-indigo-800 to-purple-700 p-4 rounded-xl shadow-md">
            <p class="text-sm text-purple-200">Budget Plans</p>
            <h3 class="text-3xl font-bold">{{ count($budgets) }}</h3>
        </div>
        <div class="bg-gradient-to-br from-fuchsia-600 to-purple-800 p-4 rounded-xl shadow-md">
            <p class="text-sm text-purple-200">Predicted Trends</p>
            <h3 class="text-3xl font-bold">{{ count($trends) }}</h3>
        </div>
    </div>

    <!-- Budget Progress -->
    <div class="bg-white/5 rounded-xl p-4 backdrop-blur-md">
        <h3 class="text-lg font-semibold mb-2">Budget Progress</h3>
        @forelse($budgets as $budget)
            @php
                $spent = $transactions->where('month_year', $budget->month_year)->sum('amount');
                $progress = $budget->target_amount > 0 ? ($spent / $budget->target_amount) * 100 : 0;
            @endphp
            <div class="mb-2">
                <div class="flex justify-between text-sm text-purple-200">
                    <span>{{ $budget->month_year }}</span>
                    <span>${{ number_format($spent, 2) }} / ${{ $budget->target_amount }}</span>
                </div>
                <div class="w-full bg-purple-900 h-2 rounded">
                    <div class="bg-purple-400 h-2 rounded" style="width: {{ $progress }}%"></div>
                </div>
            </div>
        @empty
            <p class="text-purple-300">No budgets yet.</p>
        @endforelse
    </div>

    <!-- Transactions -->
    <div class="bg-white/5 rounded-xl p-4 backdrop-blur-md">
        <div class="flex justify-between items-center mb-2">
            <h3 class="text-lg font-semibold">Your Transactions</h3>
            <input type="text" placeholder="Search..." class="px-3 py-1 rounded bg-purple-900 text-white text-sm placeholder-purple-300 focus:outline-none">
        </div>
        <div class="space-y-1 text-sm max-h-64 overflow-y-auto">
            @forelse($transactions as $txn)
                <div class="flex justify-between border-b border-white/10 py-1">
                    <span>{{ $txn->transaction_date }}</span>
                    <span>{{ $txn->description }}</span>
                    <span class="text-green-400 font-bold">${{ $txn->amount }}</span>
                </div>
            @empty
                <p class="text-purple-300">No transactions yet.</p>
            @endforelse
        </div>
    </div>

    <!-- Trends Chart -->
    <div class="bg-white/5 rounded-xl p-4 backdrop-blur-md">
        <h3 class="text-lg font-semibold mb-2">Spending Trends</h3>
        <canvas id="trendsChart" height="150"></canvas>
    </div>
</div>

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
        background: linear-gradient(to right, #8b5cf6, #7c3aed);
        color: white;
        font-size: 2rem;
        text-align: center;
        line-height: 56px;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(139, 92, 246, 0.6);
        transition: all 0.3s ease;
    }
    #add-btn:hover {
        transform: scale(1.1);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const trendLabels = {!! json_encode($trends->pluck('month_year')) !!};
    const trendData = {!! json_encode($trends->pluck('predicted_next_month')) !!};
</script>
<script>
    const ctx = document.getElementById('trendsChart').getContext('2d');
    const trendsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: trendLabels,
            datasets: [{
                label: 'Predicted Spend',
                data: trendData,
                borderColor: '#c084fc',
                backgroundColor: 'rgba(192, 132, 252, 0.2)',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#ddd' },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                },
                x: {
                    ticks: { color: '#ddd' },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                }
            },
            plugins: {
                legend: {
                    labels: { color: '#fff' }
                }
            }
        }
    });
</script>
@endpush