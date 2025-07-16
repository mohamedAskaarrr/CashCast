@extends('layouts.mvp')

@section('title', 'Budget Details')

@section('content')
<div class="space-y-6">
    <!-- Page Header with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Budget Details</h1>
                <p class="text-gray-600 dark:text-gray-300 mt-1">{{ $budget->category->name ?? 'Uncategorized' }} Budget Plan</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('budgets.edit', $budget) }}" class="bg-blue-600/80 hover:bg-blue-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-blue-500/30 transition-all duration-300 hover:shadow-lg inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('budgets.index') }}" class="bg-gray-600/80 hover:bg-gray-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-gray-500/30 transition-all duration-300 hover:shadow-lg inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Budgets
                </a>
            </div>
        </div>
    </div>

    @php
        $percentage = $budget->amount > 0 ? ($budget->spent_amount / $budget->amount) * 100 : 0;
        $isOverBudget = $percentage > 100;
        $remaining = $budget->amount - $budget->spent_amount;
    @endphp

    <!-- Budget Overview Cards with Glassmorphism -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6 transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Budget</p>
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">${{ number_format($budget->amount, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6 transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-red-100 dark:bg-red-900/50 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-4 h-4 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Spent</p>
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">${{ number_format($budget->spent_amount, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6 transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 {{ $remaining >= 0 ? 'bg-green-100 dark:bg-green-900/50' : 'bg-red-100 dark:bg-red-900/50' }} rounded-full flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-4 h-4 {{ $remaining >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Remaining</p>
                    <p class="text-2xl font-semibold {{ $remaining >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        ${{ number_format($remaining, 2) }}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6 transform hover:scale-105 transition-all duration-300">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 {{ $isOverBudget ? 'bg-red-100 dark:bg-red-900/50' : ($percentage > 80 ? 'bg-yellow-100 dark:bg-yellow-900/50' : 'bg-green-100 dark:bg-green-900/50') }} rounded-full flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-4 h-4 {{ $isOverBudget ? 'text-red-600 dark:text-red-400' : ($percentage > 80 ? 'text-yellow-600 dark:text-yellow-400' : 'text-green-600 dark:text-green-400') }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Used</p>
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">{{ number_format($percentage, 1) }}%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Budget Progress with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Budget Progress</h2>
        
        <div class="space-y-4">
            <div class="flex justify-between items-center">
                <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $budget->category->name ?? 'Uncategorized' }}</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    ${{ number_format($budget->spent_amount, 2) }} / ${{ number_format($budget->amount, 2) }}
                </span>
            </div>
            
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                <div class="h-3 rounded-full transition-all duration-300 {{ $isOverBudget ? 'bg-red-500' : ($percentage > 80 ? 'bg-yellow-500' : 'bg-green-500') }}" 
                     style="width: {{ min($percentage, 100) }}%"></div>
            </div>
            
            <div class="flex justify-between text-sm">
                <span class="text-gray-600 dark:text-gray-400">0%</span>
                <span class="text-gray-600 dark:text-gray-400">{{ number_format($percentage, 1) }}%</span>
                <span class="text-gray-600 dark:text-gray-400">100%</span>
            </div>
            
            @if($isOverBudget)
                <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800/50 rounded-xl p-4 backdrop-blur-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-red-600 dark:text-red-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <span class="text-sm font-medium text-red-800 dark:text-red-200">
                            Over budget by ${{ number_format($budget->spent_amount - $budget->amount, 2) }}
                        </span>
                    </div>
                </div>
            @elseif($percentage > 80)
                <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800/50 rounded-xl p-4 backdrop-blur-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <span class="text-sm font-medium text-yellow-800 dark:text-yellow-200">
                            Warning: {{ number_format(100 - $percentage, 1) }}% of budget remaining
                        </span>
                    </div>
                </div>
            @else
                <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800/50 rounded-xl p-4 backdrop-blur-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-600 dark:text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium text-green-800 dark:text-green-200">
                            On track: ${{ number_format($remaining, 2) }} remaining
                        </span>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Budget Details with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Budget Information</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Basic Details</h3>
                <dl class="space-y-2">
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Category:</dt>
                        <dd class="text-sm text-gray-900 dark:text-white font-medium">{{ $budget->category->name ?? 'Uncategorized' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Budget Amount:</dt>
                        <dd class="text-sm text-gray-900 dark:text-white font-medium">${{ number_format($budget->amount, 2) }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Period:</dt>
                        <dd class="text-sm text-gray-900 dark:text-white font-medium">{{ $budget->period ?? 'Monthly' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Start Date:</dt>
                        <dd class="text-sm text-gray-900 dark:text-white font-medium">{{ $budget->start_date ? $budget->start_date->format('M d, Y') : 'N/A' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">End Date:</dt>
                        <dd class="text-sm text-gray-900 dark:text-white font-medium">{{ $budget->end_date ? $budget->end_date->format('M d, Y') : 'N/A' }}</dd>
                    </div>
                </dl>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Spending Summary</h3>
                <dl class="space-y-2">
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Total Spent:</dt>
                        <dd class="text-sm text-gray-900 dark:text-white font-medium">${{ number_format($budget->spent_amount, 2) }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Remaining:</dt>
                        <dd class="text-sm font-medium {{ $remaining >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                            ${{ number_format($remaining, 2) }}
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Percentage Used:</dt>
                        <dd class="text-sm font-medium {{ $isOverBudget ? 'text-red-600 dark:text-red-400' : ($percentage > 80 ? 'text-yellow-600 dark:text-yellow-400' : 'text-green-600 dark:text-green-400') }}">
                            {{ number_format($percentage, 1) }}%
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Created:</dt>
                        <dd class="text-sm text-gray-900 dark:text-white font-medium">{{ $budget->created_at->format('M d, Y') }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-sm text-gray-500 dark:text-gray-400">Last Updated:</dt>
                        <dd class="text-sm text-gray-900 dark:text-white font-medium">{{ $budget->updated_at->format('M d, Y') }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end space-x-3">
        <a href="{{ route('budgets.index') }}" class="bg-gray-600/80 hover:bg-gray-700/80 text-white px-6 py-2 rounded-xl backdrop-blur-sm border border-gray-500/30 transition-all duration-300 hover:shadow-lg">
            Back to Budgets
        </a>
        <a href="{{ route('budgets.edit', $budget) }}" class="bg-blue-600/80 hover:bg-blue-700/80 text-white px-6 py-2 rounded-xl backdrop-blur-sm border border-blue-500/30 transition-all duration-300 hover:shadow-lg">
            Edit Budget
        </a>
        <form method="POST" action="{{ route('budgets.destroy', $budget) }}" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this budget?')" class="bg-red-600/80 hover:bg-red-700/80 text-white px-6 py-2 rounded-xl backdrop-blur-sm border border-red-500/30 transition-all duration-300 hover:shadow-lg">
                Delete Budget
            </button>
        </form>
    </div>
</div>
@endsection
