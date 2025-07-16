@extends('layouts.mvp')

@section('title', 'Transaction Details')

@section('content')
<div class="space-y-6">
    <!-- Page Header with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Transaction Details</h1>
                <p class="text-gray-600 dark:text-gray-300 mt-1">View transaction information</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('transactions.edit', $transaction) }}" class="bg-blue-600/80 hover:bg-blue-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-blue-500/30 transition-all duration-300 hover:shadow-lg inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('transactions.index') }}" class="bg-gray-600/80 hover:bg-gray-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-gray-500/30 transition-all duration-300 hover:shadow-lg inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Transactions
                </a>
            </div>
        </div>
    </div>

    <!-- Transaction Details Card with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 overflow-hidden">
        <div class="px-6 py-4 bg-gradient-to-r from-gray-50/80 to-gray-100/80 dark:from-gray-900/50 dark:to-gray-800/50 border-b border-gray-200/50 dark:border-gray-700/50">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $transaction->description }}</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-300">{{ $transaction->transaction_date->format('M d, Y') }}</p>
                </div>
                <div class="text-right">
                    <span class="inline-flex items-center px-3 py-1 text-sm font-semibold rounded-full backdrop-blur-sm border {{ $transaction->type === 'income' ? 'bg-green-100/80 dark:bg-green-900/50 text-green-800 dark:text-green-200 border-green-200/50 dark:border-green-700/50' : 'bg-red-100/80 dark:bg-red-900/50 text-red-800 dark:text-red-200 border-red-200/50 dark:border-red-700/50' }}">
                        {{ ucfirst($transaction->type) }}
                    </span>
                    <div class="mt-1 text-2xl font-bold {{ $transaction->type === 'income' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                        {{ $transaction->type === 'income' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Information -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Basic Information</h3>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Amount</dt>
                            <dd class="text-lg font-semibold {{ $transaction->type === 'income' ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                {{ $transaction->type === 'income' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                            </dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Type</dt>
                            <dd class="text-sm text-gray-900 dark:text-white">{{ ucfirst($transaction->type) }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</dt>
                            <dd class="text-sm text-gray-900 dark:text-white">{{ $transaction->category->name ?? 'Uncategorized' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date</dt>
                            <dd class="text-sm text-gray-900 dark:text-white">{{ $transaction->transaction_date->format('F d, Y') }}</dd>
                        </div>
                    </dl>
                </div>

                <!-- Additional Information -->
                <div>
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Additional Information</h3>
                    <dl class="space-y-3">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</dt>
                            <dd class="text-sm text-gray-900 dark:text-white">{{ $transaction->description }}</dd>
                        </div>
                        @if($transaction->notes)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Notes</dt>
                            <dd class="text-sm text-gray-900 dark:text-white">{{ $transaction->notes }}</dd>
                        </div>
                        @endif
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Created</dt>
                            <dd class="text-sm text-gray-900 dark:text-white">{{ $transaction->created_at->format('F d, Y \a\t g:i A') }}</dd>
                        </div>
                        @if($transaction->updated_at != $transaction->created_at)
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Modified</dt>
                            <dd class="text-sm text-gray-900 dark:text-white">{{ $transaction->updated_at->format('F d, Y \a\t g:i A') }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('transactions.index') }}" class="bg-gray-600/80 hover:bg-gray-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-gray-500/30 transition-all duration-300 hover:shadow-lg">
                    Back to List
                </a>
                <a href="{{ route('transactions.edit', $transaction) }}" class="bg-blue-600/80 hover:bg-blue-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-blue-500/30 transition-all duration-300 hover:shadow-lg">
                    Edit Transaction
                </a>
                <form method="POST" action="{{ route('transactions.destroy', $transaction) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this transaction?')" class="bg-red-600/80 hover:bg-red-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-red-500/30 transition-all duration-300 hover:shadow-lg">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
