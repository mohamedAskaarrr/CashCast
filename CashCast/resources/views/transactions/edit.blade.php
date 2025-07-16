@extends('layouts.mvp')

@section('title', 'Edit Transaction')

@section('content')
<div class="space-y-6">
    <!-- Page Header with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Transaction</h1>
                <p class="text-gray-600 dark:text-gray-300 mt-1">Update transaction details</p>
            </div>
            <a href="{{ route('transactions.index') }}" class="bg-gray-600/80 hover:bg-gray-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-gray-500/30 transition-all duration-300 hover:shadow-lg inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Transactions
            </a>
        </div>
    </div>

    <!-- Edit Form with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6">
        <form method="POST" action="{{ route('transactions.update', $transaction) }}">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Transaction Type -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Type *</label>
                    <div class="flex space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="type" value="income" class="mr-2 text-green-600 focus:ring-green-500" {{ old('type', $transaction->type) === 'income' ? 'checked' : '' }} required>
                            <span class="text-green-600 dark:text-green-400 font-medium">Income</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="type" value="expense" class="mr-2 text-red-600 focus:ring-red-500" {{ old('type', $transaction->type) === 'expense' ? 'checked' : '' }} required>
                            <span class="text-red-600 dark:text-red-400 font-medium">Expense</span>
                        </label>
                    </div>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Amount *</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-500 dark:text-gray-400">$</span>
                        <input type="number" 
                               id="amount" 
                               name="amount" 
                               value="{{ old('amount', $transaction->amount) }}" 
                               step="0.01" 
                               min="0" 
                               class="w-full pl-8 pr-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 backdrop-blur-sm {{ $errors->has('amount') ? 'border-red-500 focus:ring-red-500' : '' }}"
                               placeholder="0.00" 
                               required>
                    </div>
                    @error('amount')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description *</label>
                    <input type="text" 
                           id="description" 
                           name="description" 
                           value="{{ old('description', $transaction->description) }}" 
                           class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 backdrop-blur-sm {{ $errors->has('description') ? 'border-red-500 focus:ring-red-500' : '' }}"
                           placeholder="Enter transaction description" 
                           required>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category *</label>
                    <select id="category_id" 
                            name="category_id" 
                            class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white backdrop-blur-sm {{ $errors->has('category_id') ? 'border-red-500 focus:ring-red-500' : '' }}"
                            required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $transaction->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Transaction Date -->
                <div>
                    <label for="transaction_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date *</label>
                    <input type="date" 
                           id="transaction_date" 
                           name="transaction_date" 
                           value="{{ old('transaction_date', $transaction->transaction_date->format('Y-m-d')) }}" 
                           class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white backdrop-blur-sm {{ $errors->has('transaction_date') ? 'border-red-500 focus:ring-red-500' : '' }}"
                           required>
                    @error('transaction_date')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="md:col-span-2">
                    <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Notes</label>
                    <textarea id="notes" 
                              name="notes" 
                              rows="3"
                              class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 backdrop-blur-sm {{ $errors->has('notes') ? 'border-red-500 focus:ring-red-500' : '' }}"
                              placeholder="Additional notes (optional)">{{ old('notes', $transaction->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('transactions.show', $transaction) }}" class="bg-gray-600/80 hover:bg-gray-700/80 text-white px-6 py-2 rounded-xl backdrop-blur-sm border border-gray-500/30 transition-all duration-300 hover:shadow-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600/80 hover:bg-blue-700/80 text-white px-6 py-2 rounded-xl backdrop-blur-sm border border-blue-500/30 transition-all duration-300 hover:shadow-lg">
                    Update Transaction
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
