@extends('layouts.mvp')

@section('title', 'Edit Budget')

@section('content')
<div class="space-y-6">
    <!-- Page Header with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Edit Budget Plan</h1>
                <p class="text-gray-600 dark:text-gray-300 mt-1">Update your budget details</p>
            </div>
            <a href="{{ route('budgets.index') }}" class="bg-gray-600/80 hover:bg-gray-700/80 text-white px-4 py-2 rounded-xl backdrop-blur-sm border border-gray-500/30 transition-all duration-300 hover:shadow-lg inline-flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Budgets
            </a>
        </div>
    </div>

    <!-- Edit Form with Glassmorphism -->
    <div class="bg-white/80 dark:bg-gray-800/80 backdrop-blur-lg rounded-2xl shadow-xl border border-white/20 dark:border-gray-700/30 p-6">
        <form method="POST" action="{{ route('budgets.update', $budget) }}">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category *</label>
                    <select id="category_id" 
                            name="category_id" 
                            class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white backdrop-blur-sm {{ $errors->has('category_id') ? 'border-red-500 focus:ring-red-500' : '' }}"
                            required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $budget->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Budget Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Budget Amount *</label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-500 dark:text-gray-400">$</span>
                        <input type="number" 
                               id="amount" 
                               name="amount" 
                               value="{{ old('amount', $budget->amount) }}" 
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

                <!-- Period -->
                <div>
                    <label for="period" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Period</label>
                    <select id="period" 
                            name="period" 
                            class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white backdrop-blur-sm {{ $errors->has('period') ? 'border-red-500 focus:ring-red-500' : '' }}">
                        <option value="monthly" {{ old('period', $budget->period) === 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="weekly" {{ old('period', $budget->period) === 'weekly' ? 'selected' : '' }}>Weekly</option>
                        <option value="yearly" {{ old('period', $budget->period) === 'yearly' ? 'selected' : '' }}>Yearly</option>
                    </select>
                    @error('period')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Start Date</label>
                    <input type="date" 
                           id="start_date" 
                           name="start_date" 
                           value="{{ old('start_date', $budget->start_date ? $budget->start_date->format('Y-m-d') : '') }}" 
                           class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white backdrop-blur-sm {{ $errors->has('start_date') ? 'border-red-500 focus:ring-red-500' : '' }}">
                    @error('start_date')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">End Date</label>
                    <input type="date" 
                           id="end_date" 
                           name="end_date" 
                           value="{{ old('end_date', $budget->end_date ? $budget->end_date->format('Y-m-d') : '') }}" 
                           class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white backdrop-blur-sm {{ $errors->has('end_date') ? 'border-red-500 focus:ring-red-500' : '' }}">
                    @error('end_date')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alert Threshold -->
                <div>
                    <label for="alert_threshold" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Alert Threshold (%)</label>
                    <input type="number" 
                           id="alert_threshold" 
                           name="alert_threshold" 
                           value="{{ old('alert_threshold', $budget->alert_threshold ?? 80) }}" 
                           min="0" 
                           max="100" 
                           class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 backdrop-blur-sm {{ $errors->has('alert_threshold') ? 'border-red-500 focus:ring-red-500' : '' }}"
                           placeholder="80">
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Get notified when spending reaches this percentage of your budget</p>
                    @error('alert_threshold')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea id="description" 
                              name="description" 
                              rows="3"
                              class="w-full px-3 py-2 bg-white/50 dark:bg-gray-700/50 border border-gray-300 dark:border-gray-600 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 backdrop-blur-sm {{ $errors->has('description') ? 'border-red-500 focus:ring-red-500' : '' }}"
                              placeholder="Optional description for this budget">{{ old('description', $budget->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Current Budget Status -->
            @if($budget->spent_amount > 0)
            <div class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800/50 rounded-xl p-4 backdrop-blur-sm">
                <h3 class="text-sm font-medium text-blue-800 dark:text-blue-200 mb-2">Current Budget Status</h3>
                <div class="text-sm text-blue-700 dark:text-blue-300">
                    <div class="flex justify-between mb-1">
                        <span>Spent: ${{ number_format($budget->spent_amount, 2) }}</span>
                        <span>Current Budget: ${{ number_format($budget->amount, 2) }}</span>
                    </div>
                    <div class="w-full bg-blue-200 dark:bg-blue-800 rounded-full h-2">
                        @php
                            $percentage = $budget->amount > 0 ? ($budget->spent_amount / $budget->amount) * 100 : 0;
                        @endphp
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ min($percentage, 100) }}%"></div>
                    </div>
                    <div class="text-xs mt-1">{{ number_format($percentage, 1) }}% used</div>
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('budgets.show', $budget) }}" class="bg-gray-600/80 hover:bg-gray-700/80 text-white px-6 py-2 rounded-xl backdrop-blur-sm border border-gray-500/30 transition-all duration-300 hover:shadow-lg">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-600/80 hover:bg-blue-700/80 text-white px-6 py-2 rounded-xl backdrop-blur-sm border border-blue-500/30 transition-all duration-300 hover:shadow-lg">
                    Update Budget
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
