@extends('layouts.auth')
@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 text-white">
    
    <!-- Hero Section with Animated Background -->
    <div class="relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-20 w-32 h-32 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-40 right-20 w-32 h-32 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-200"></div>
            <div class="absolute -bottom-8 left-40 w-32 h-32 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-400"></div>
        </div>
        
        <!-- Main Header -->
        <div class="relative z-10 px-6 py-8">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <!-- Welcome Section -->
                    <div class="text-center lg:text-left mb-8 lg:mb-0">
                        <h1 class="text-4xl lg:text-6xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-4">
                            Welcome back, {{ auth()->user()->name }}! 
                        </h1>
                        <p class="text-xl text-gray-300 mb-6">Ready to take control of your finances?</p>
                        <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                            <button class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 px-6 py-3 rounded-full font-semibold transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Add Transaction
                            </button>
                            <button class="bg-white/10 hover:bg-white/20 backdrop-blur-sm border border-white/20 px-6 py-3 rounded-full font-semibold transition-all duration-300">
                                <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                View Reports
                            </button>
                        </div>
                    </div>
                    
                    <!-- Hero Illustration -->
                    <div class="flex-shrink-0">
                        <div class="relative">
                            <svg width="300" height="300" viewBox="0 0 300 300" class="animate-float">
                                <!-- Financial Growth Illustration -->
                                <defs>
                                    <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#8b5cf6;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#ec4899;stop-opacity:1" />
                                    </linearGradient>
                                    <linearGradient id="coinGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#fbbf24;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#f59e0b;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                
                                <!-- Background Circle -->
                                <circle cx="150" cy="150" r="130" fill="url(#heroGradient)" opacity="0.1"/>
                                
                                <!-- Phone/App mockup -->
                                <rect x="110" y="80" width="80" height="140" rx="15" fill="url(#heroGradient)" opacity="0.9"/>
                                <rect x="115" y="90" width="70" height="120" rx="5" fill="#1e293b"/>
                                
                                <!-- App screen elements -->
                                <rect x="120" y="95" width="60" height="4" rx="2" fill="#8b5cf6"/>
                                <rect x="120" y="105" width="40" height="3" rx="1" fill="#64748b"/>
                                <rect x="120" y="115" width="50" height="3" rx="1" fill="#64748b"/>
                                
                                <!-- Chart on phone -->
                                <path d="M 125 130 Q 140 140 155 125 Q 170 115 175 130" stroke="#10b981" stroke-width="2" fill="none"/>
                                <circle cx="125" cy="130" r="2" fill="#10b981"/>
                                <circle cx="155" cy="125" r="2" fill="#10b981"/>
                                <circle cx="175" cy="130" r="2" fill="#10b981"/>
                                
                                <!-- Floating coins -->
                                <circle cx="80" cy="120" r="12" fill="url(#coinGradient)" class="animate-bounce">
                                    <animate attributeName="cy" values="120;110;120" dur="2s" repeatCount="indefinite"/>
                                </circle>
                                <text x="80" y="125" text-anchor="middle" fill="#92400e" font-size="10" font-weight="bold">$</text>
                                
                                <circle cx="220" cy="100" r="12" fill="url(#coinGradient)" class="animate-bounce">
                                    <animate attributeName="cy" values="100;90;100" dur="2.5s" repeatCount="indefinite"/>
                                </circle>
                                <text x="220" y="105" text-anchor="middle" fill="#92400e" font-size="10" font-weight="bold">$</text>
                                
                                <!-- Growth arrow -->
                                <path d="M 60 200 L 240 80" stroke="#10b981" stroke-width="3" fill="none" opacity="0.7"/>
                                <path d="M 230 75 L 240 80 L 235 90" stroke="#10b981" stroke-width="3" fill="none"/>
                                
                                <!-- Success indicators -->
                                <circle cx="200" cy="180" r="8" fill="#10b981"/>
                                <path d="M 196 180 L 199 183 L 204 177" stroke="white" stroke-width="2" fill="none"/>
                                
                                <circle cx="100" cy="240" r="8" fill="#10b981"/>
                                <path d="M 96 240 L 99 243 L 104 237" stroke="white" stroke-width="2" fill="none"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards with Beautiful Animations -->
    <div class="px-6 py-8 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Transactions Card -->
            <div class="group relative bg-gradient-to-r from-purple-600/20 to-pink-600/20 backdrop-blur-sm border border-purple-500/30 rounded-2xl p-6 hover:border-purple-400/50 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-600/10 to-pink-600/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl animate-pulse">💳</span>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2">{{ count($transactions) }}</h3>
                    <p class="text-purple-200">Total Transactions</p>
                    <div class="mt-4 flex items-center text-sm text-green-400">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        +12% from last month
                    </div>
                </div>
            </div>

            <!-- Budget Plans Card -->
            <div class="group relative bg-gradient-to-r from-indigo-600/20 to-purple-600/20 backdrop-blur-sm border border-indigo-500/30 rounded-2xl p-6 hover:border-indigo-400/50 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-600/10 to-purple-600/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl animate-pulse">📊</span>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2">{{ count($budgets) }}</h3>
                    <p class="text-indigo-200">Budget Plans</p>
                    <div class="mt-4 flex items-center text-sm text-green-400">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        On track this month
                    </div>
                </div>
            </div>

            <!-- Trends Card -->
            <div class="group relative bg-gradient-to-r from-pink-600/20 to-rose-600/20 backdrop-blur-sm border border-pink-500/30 rounded-2xl p-6 hover:border-pink-400/50 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-r from-pink-600/10 to-rose-600/10 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gradient-to-r from-pink-600 to-rose-600 rounded-xl">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                            </svg>
                        </div>
                        <span class="text-2xl animate-pulse">📈</span>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-2">{{ count($trends) }}</h3>
                    <p class="text-pink-200">Predicted Trends</p>
                    <div class="mt-4 flex items-center text-sm text-green-400">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Positive outlook
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Budget Progress - Enhanced -->
            <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:border-white/20 transition-all duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Budget Progress
                    </h3>
                    <div class="text-sm bg-purple-600/20 px-3 py-1 rounded-full border border-purple-500/30">
                        This Month
                    </div>
                </div>
                
                @forelse($budgets as $budget)
                    @php
                        $spent = $transactions->where('month_year', $budget->month_year)->sum('amount');
                        $progress = $budget->target_amount > 0 ? ($spent / $budget->target_amount) * 100 : 0;
                        $progressColor = $progress > 90 ? 'bg-red-500' : ($progress > 70 ? 'bg-yellow-500' : 'bg-green-500');
                    @endphp
                    <div class="mb-6 p-4 bg-white/5 rounded-xl border border-white/10">
                        <div class="flex justify-between items-center mb-3">
                            <div class="flex items-center">
                                <div class="w-2 h-2 rounded-full {{ $progressColor }} mr-3"></div>
                                <span class="font-semibold text-white">{{ $budget->month_year }}</span>
                            </div>
                            <span class="text-sm text-purple-300">
                                ${{ number_format($spent, 2) }} / ${{ number_format($budget->target_amount, 2) }}
                            </span>
                        </div>
                        <div class="w-full bg-gray-700 h-3 rounded-full overflow-hidden">
                            <div class="h-full {{ $progressColor }} transition-all duration-1000 ease-out" style="width: {{ min($progress, 100) }}%"></div>
                        </div>
                        <div class="mt-2 text-xs text-gray-400">
                            {{ number_format($progress, 1) }}% of budget used
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray-400">No budgets created yet</p>
                        <button class="mt-4 bg-purple-600 hover:bg-purple-700 px-4 py-2 rounded-lg text-sm transition-colors">
                            Create Your First Budget
                        </button>
                    </div>
                @endforelse
            </div>

            <!-- Transactions - Enhanced -->
            <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:border-white/20 transition-all duration-300">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                        </svg>
                        Recent Transactions
                    </h3>
                    <div class="relative">
                        <input type="text" placeholder="Search transactions..." 
                               class="bg-white/10 border border-white/20 rounded-lg px-4 py-2 pl-10 text-sm text-white placeholder-gray-400 focus:outline-none focus:border-purple-500 focus:ring-2 focus:ring-purple-500/20">
                        <svg class="absolute left-3 top-2.5 w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                
                <div class="max-h-80 overflow-y-auto custom-scrollbar">
                    @forelse($transactions as $txn)
                        <div class="flex items-center justify-between p-3 mb-2 bg-white/5 rounded-lg border border-white/10 hover:bg-white/10 transition-colors">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-medium">{{ $txn->description }}</p>
                                    <p class="text-gray-400 text-sm">{{ \Carbon\Carbon::parse($txn->transaction_date)->format('M d, Y') }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-green-400 font-bold text-lg">${{ number_format($txn->amount, 2) }}</p>
                                <p class="text-xs text-gray-400">Income</p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                            </svg>
                            <p class="text-gray-400">No transactions yet</p>
                            <button class="mt-4 bg-green-600 hover:bg-green-700 px-4 py-2 rounded-lg text-sm transition-colors">
                                Add Your First Transaction
                            </button>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Enhanced Chart Section -->
        <div class="mt-8 bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:border-white/20 transition-all duration-300">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-2 text-pink-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                    Spending Trends & Predictions
                </h3>
                <div class="flex space-x-2">
                    <button class="bg-purple-600/20 border border-purple-500/30 px-3 py-1 rounded-lg text-sm transition-colors hover:bg-purple-600/30">
                        Weekly
                    </button>
                    <button class="bg-white/10 border border-white/20 px-3 py-1 rounded-lg text-sm transition-colors hover:bg-white/20">
                        Monthly
                    </button>
                    <button class="bg-white/10 border border-white/20 px-3 py-1 rounded-lg text-sm transition-colors hover:bg-white/20">
                        Yearly
                    </button>
                </div>
            </div>
            <div class="relative">
                <canvas id="trendsChart" height="200"></canvas>
            </div>
        </div>
    </div>

    <!-- Beautiful Floating Action Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <div class="relative group">
            <button id="fab-main" class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 w-16 h-16 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 group-hover:rotate-45">
                <svg class="w-8 h-8 text-white transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            
            <!-- Quick Actions -->
            <div class="absolute bottom-20 right-0 space-y-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-4 group-hover:translate-y-0">
                <button class="bg-green-600 hover:bg-green-700 w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition-all duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                </button>
                <button class="bg-blue-600 hover:bg-blue-700 w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition-all duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                    </svg>
                </button>
                <button class="bg-purple-600 hover:bg-purple-700 w-12 h-12 rounded-full shadow-lg flex items-center justify-center transition-all duration-300">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(139, 92, 246, 0.5);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(139, 92, 246, 0.7);
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
    
    // Create gradient for the chart
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(139, 92, 246, 0.3)');
    gradient.addColorStop(1, 'rgba(139, 92, 246, 0.05)');
    
    const trendsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: trendLabels,
            datasets: [{
                label: 'Predicted Spend',
                data: trendData,
                borderColor: '#8b5cf6',
                backgroundColor: gradient,
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#8b5cf6',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 3,
                pointRadius: 6,
                pointHoverRadius: 8
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
                        color: '#9ca3af',
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    },
                    grid: { 
                        color: 'rgba(255,255,255,0.1)',
                        borderDash: [5, 5]
                    }
                },
                x: {
                    ticks: { color: '#9ca3af' },
                    grid: { 
                        color: 'rgba(255,255,255,0.1)',
                        borderDash: [5, 5]
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });
</script>
@endpush