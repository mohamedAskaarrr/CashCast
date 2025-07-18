@extends('layouts.mvp')

@section('title', 'Budget Details')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Budget Details</h1>
        <div class="flex space-x-2">
            <a href="{{ route('budgets.edit', $budget) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Edit
            </a>
            <a href="{{ route('budgets.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Budgets
            </a>
        </div>
    </div>

    @php
        $percentage = $budget->amount > 0 ? ($budget->spent_amount / $budget->amount) * 100 : 0;
        $isOverBudget = $percentage > 100;
        $remaining = $budget->amount - $budget->spent_amount;
    @endphp

    <!-- Budget Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Budget</p>
                    <p class="text-2xl font-semibold text-gray-900">${{ number_format($budget->amount, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Spent</p>
                    <p class="text-2xl font-semibold text-gray-900">${{ number_format($budget->spent_amount, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 {{ $remaining >= 0 ? 'bg-green-100' : 'bg-red-100' }} rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 {{ $remaining >= 0 ? 'text-green-600' : 'text-red-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Remaining</p>
                    <p class="text-2xl font-semibold {{ $remaining >= 0 ? 'text-green-600' : 'text-red-600' }}">${{ number_format($remaining, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Progress</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ number_format($percentage, 1) }}%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Budget Progress -->
    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Budget Progress</h3>
        <div class="w-full bg-gray-200 rounded-full h-4">
            <div class="h-4 rounded-full {{ $isOverBudget ? 'bg-red-500' : ($percentage > 80 ? 'bg-yellow-500' : 'bg-green-500') }}" 
                 style="width: {{ min($percentage, 100) }}%"></div>
        </div>
        <div class="flex justify-between text-sm text-gray-600 mt-2">
            <span>0%</span>
            <span class="font-medium">{{ number_format($percentage, 1) }}%</span>
            <span>100%</span>
        </div>
        @if($isOverBudget)
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Over Budget</h3>
                        <p class="text-sm text-red-700 mt-1">You have exceeded your budget by ${{ number_format(abs($remaining), 2) }}.</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Budget Details -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Budget Information</h3>
            <dl class="space-y-3">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Category</dt>
                    <dd class="text-sm text-gray-900">{{ $budget->category->name ?? 'Uncategorized' }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Period</dt>
                    <dd class="text-sm text-gray-900">{{ ucfirst($budget->period) }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Duration</dt>
                    <dd class="text-sm text-gray-900">{{ $budget->start_date->format('M j, Y') }} - {{ $budget->end_date->format('M j, Y') }}</dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="text-sm text-gray-900">
                        <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $budget->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $budget->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Created</dt>
                    <dd class="text-sm text-gray-900">{{ $budget->created_at->format('M j, Y g:i A') }}</dd>
                </div>
            </dl>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Transactions</h3>
            @if($recentTransactions->count() > 0)
                <div class="space-y-3">
                    @foreach($recentTransactions as $transaction)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div>
                            <p class="text-sm font-medium text-gray-900">{{ $transaction->description }}</p>
                            <p class="text-xs text-gray-500">{{ $transaction->transaction_date->format('M j, Y') }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-medium text-red-600">-${{ number_format($transaction->amount, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="{{ route('transactions.index', ['category' => $budget->category_id]) }}" class="text-blue-600 hover:text-blue-900 text-sm font-medium">
                        View all transactions →
                    </a>
                </div>
            @else
                <p class="text-sm text-gray-500">No transactions found for this category.</p>
            @endif
        </div>
    </div>

    @if($budget->description)
    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <h3 class="text-lg font-medium text-gray-900 mb-3">Description</h3>
        <p class="text-sm text-gray-700">{{ $budget->description }}</p>
    </div>
    @endif

    <!-- Action Buttons -->
    <div class="flex justify-between mt-8">
        <form method="POST" action="{{ route('budgets.destroy', $budget) }}" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg inline-flex items-center" onclick="return confirm('Are you sure you want to delete this budget?')">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                Delete Budget
            </button>
        </form>
        <a href="{{ route('budgets.edit', $budget) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg inline-flex items-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Edit Budget
        </a>
    </div>
</div>
@endsection
