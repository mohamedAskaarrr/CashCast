@extends('layouts.mvp')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-white card p-6">
        <h1 class="text-2xl font-bold text-gray-900">Financial Dashboard</h1>
        <p class="text-gray-600 mt-1">Welcome back, {{ auth()->user()->name }}! Here's your financial overview.</p>
    </div>

    <!-- Financial Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1: Total Balance -->
        <div class="card p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Balance</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        ${{ number_format($totalBalance ?? 0, 2) }}
                    </p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900 rounded-full">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5h2m-2 2h2m-2 2h2m-2-6h2m-2 2h2"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm mt-2 {{ ($totalBalance ?? 0) >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                {{ ($totalBalance ?? 0) >= 0 ? 'Positive' : 'Negative' }} Balance
            </p>
        </div>

        <!-- Card 2: Monthly Income -->
        <div class="card p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Monthly Income</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        ${{ number_format($monthlyIncome ?? 0, 2) }}
                    </p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-full">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                </div>
            </div>
             <p class="text-sm text-gray-500 mt-2">Current month's earnings</p>
        </div>

        <!-- Card 3: Monthly Expenses -->
        <div class="card p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Monthly Expenses</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        ${{ number_format($monthlyExpenses ?? 0, 2) }}
                    </p>
                </div>
                <div class="p-3 bg-red-100 dark:bg-red-900 rounded-full">
                    <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-2">Current month's spending</p>
        </div>

        <!-- Card 4: Net Income -->
        <div class="card p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Net Income</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">
                        ${{ number_format(($monthlyIncome ?? 0) - ($monthlyExpenses ?? 0), 2) }}
                    </p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-full">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
            </div>
             <p class="text-sm text-gray-500 mt-2">Income after expenses</p>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="card p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Spending Trend</h2>
            <div class="h-64">
                <canvas id="spendingChart"></canvas>
            </div>
        </div>
        <div class="card p-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Category Breakdown</h2>
            <div class="h-64">
                <canvas id="categoryChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="card p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-gray-900">Recent Transactions</h2>
            <a href="{{-- route('transactions.create') --}}" class="btn-primary">Add Transaction</a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full table-striped">
                <thead>
                    <tr class="border-b">
                        <th class="text-left py-3 px-4 font-medium text-gray-900">Date</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-900">Description</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-900">Category</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-900">Amount</th>
                        <th class="text-left py-3 px-4 font-medium text-gray-900">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-3 px-4 text-sm text-gray-900">2025-07-15</td>
                        <td class="py-3 px-4 text-sm text-gray-900">Grocery Shopping</td>
                        <td class="py-3 px-4 text-sm text-gray-600">Food & Dining</td>
                        <td class="py-3 px-4 text-sm text-red-600">-$85.40</td>
                        <td class="py-3 px-4">
                            <span class="status-badge status-success">Completed</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-sm text-gray-900">2025-07-14</td>
                        <td class="py-3 px-4 text-sm text-gray-900">Gas Station</td>
                        <td class="py-3 px-4 text-sm text-gray-600">Transportation</td>
                        <td class="py-3 px-4 text-sm text-red-600">-$45.00</td>
                        <td class="py-3 px-4">
                            <span class="status-badge status-success">Completed</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-sm text-gray-900">2025-07-13</td>
                        <td class="py-3 px-4 text-sm text-gray-900">Salary Deposit</td>
                        <td class="py-3 px-4 text-sm text-gray-600">Income</td>
                        <td class="py-3 px-4 text-sm text-green-600">+$2,500.00</td>
                        <td class="py-3 px-4">
                            <span class="status-badge status-success">Completed</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-sm text-gray-900">2025-07-12</td>
                        <td class="py-3 px-4 text-sm text-gray-900">Internet Bill</td>
                        <td class="py-3 px-4 text-sm text-gray-600">Utilities</td>
                        <td class="py-3 px-4 text-sm text-red-600">-$59.99</td>
                        <td class="py-3 px-4">
                            <span class="status-badge status-warning">Pending</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="py-3 px-4 text-sm text-gray-900">2025-07-11</td>
                        <td class="py-3 px-4 text-sm text-gray-900">Coffee Shop</td>
                        <td class="py-3 px-4 text-sm text-gray-600">Food & Dining</td>
                        <td class="py-3 px-4 text-sm text-red-600">-$4.50</td>
                        <td class="py-3 px-4">
                            <span class="status-badge status-success">Completed</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Budget Overview -->
    <div class="card p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Budget Overview</h2>
        
        <div class="space-y-4">
            <!-- Food & Dining -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-900">Food & Dining</span>
                    <span class="text-sm text-gray-600">$320 / $400</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-green-500 h-2 rounded-full" style="width: 80%"></div>
                </div>
            </div>
            
            <!-- Transportation -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-900">Transportation</span>
                    <span class="text-sm text-gray-600">$180 / $300</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-blue-500 h-2 rounded-full" style="width: 60%"></div>
                </div>
            </div>
            
            <!-- Utilities -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-900">Utilities</span>
                    <span class="text-sm text-gray-600">$250 / $200</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-red-500 h-2 rounded-full" style="width: 100%"></div> <!-- Capped at 100% for visual sanity -->
                </div>
            </div>
            
            <!-- Entertainment -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-gray-900">Entertainment</span>
                    <span class="text-sm text-gray-600">$45 / $150</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-purple-500 h-2 rounded-full" style="width: 30%"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Spending Trend Chart
    const spendingCtx = document.getElementById('spendingChart').getContext('2d');
    new Chart(spendingCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            datasets: [{
                label: 'Monthly Spending',
                data: [1200, 1400, 1100, 1300, 1250, 1180, 1240],
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value;
                        }
                    }
                }
            }
        }
    });
    
    // Category Breakdown Chart
    const categoryCtx = document.getElementById('categoryChart').getContext('2d');
    new Chart(categoryCtx, {
        type: 'doughnut',
        data: {
            labels: ['Food & Dining', 'Transportation', 'Utilities', 'Entertainment', 'Other'],
            datasets: [{
                data: [320, 180, 250, 45, 120],
                backgroundColor: [
                    '#10b981',
                    '#3b82f6',
                    '#ef4444',
                    '#8b5cf6',
                    '#6b7280'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endsection