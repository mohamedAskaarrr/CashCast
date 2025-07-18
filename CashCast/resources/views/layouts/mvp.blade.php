<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CashCast') - Financial Management</title>
    
    <!-- Tailwind CSS CDN - Simple and Fast -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Enhanced Configuration with Dark Mode -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a'
                        }
                    },
                    animation: {
                        'gradient-x': 'gradient-x 15s ease infinite',
                        'gradient-y': 'gradient-y 15s ease infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        'gradient-x': {
                            '0%, 100%': { 'background-position': '0% 50%' },
                            '50%': { 'background-position': '100% 50%' },
                        },
                        'gradient-y': {
                            '0%, 100%': { 'background-position': '50% 0%' },
                            '50%': { 'background-position': '50% 100%' },
                        },
                        'float': {
                            '0%, 100%': { 'transform': 'translateY(0px)' },
                            '50%': { 'transform': 'translateY(-20px)' },
                        },
                    }
                }
            }
        }
    </script>
    
    <!-- Custom Dark Mode Styles -->
    <style>
        /* Animated gradient background */
        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient-x 15s ease infinite;
            min-height: 100vh;
        }
        
        .dark body {
            background: linear-gradient(-45deg, #1e3a8a, #3730a3, #1e40af, #1d4ed8);
            background-size: 400% 400%;
            animation: gradient-x 15s ease infinite;
        }
        
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        /* Custom scrollbar for dark mode */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: rgba(241, 245, 249, 0.5);
        }
        .dark ::-webkit-scrollbar-track {
            background: rgba(51, 65, 85, 0.5);
        }
        ::-webkit-scrollbar-thumb {
            background: rgba(203, 213, 225, 0.8);
            border-radius: 4px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: rgba(100, 116, 139, 0.8);
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        .dark ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }
        
        /* Smooth transitions for all elements */
        * {
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }
    </style>
</head>
                    colors: {
                        'primary': '#3b82f6',
                        'secondary': '#6b7280',
                        'success': '#10b981',
                        'warning': '#f59e0b',
                        'danger': '#ef4444'
                    }
                }
            }
        }
    </script>
    
    <!-- Chart.js for Financial Data Visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- CSRF Token for Forms -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        /* Clean, simple styling with dark mode support */
        body {
            font-family: system-ui, -apple-system, sans-serif;
        }
        
        .navbar-shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        .dark .navbar-shadow {
            box-shadow: 0 1px 3px 0 rgba(255, 255, 255, 0.1);
        }
        
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }
        .dark .card {
            background: #374151;
            border-color: #4b5563;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.3);
        }
        
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.2s;
        }
        
        .btn-primary:hover {
            background-color: #2563eb;
        }
        
        .btn-secondary {
            background-color: #6b7280;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.2s;
        }
        
        .btn-secondary:hover {
            background-color: #4b5563;
        }
        
        .form-input {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            width: 100%;
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9fafb;
        }
        
        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .status-success {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .status-warning {
            background-color: #fef3c7;
            color: #92400e;
        }
        
        .status-danger {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        /* Dark mode form inputs */
        .dark .form-input {
            background-color: #374151;
            border-color: #4b5563;
            color: #f9fafb;
        }
        
        .dark .form-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .dark .table-striped tbody tr:nth-child(odd) {
            background-color: #374151;
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-200">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 navbar-shadow transition-colors duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-900 dark:text-white transition-colors duration-200">
                        💰 CashCast
                    </a>
                </div>
                
                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        Dashboard
                    </a>
                    <a href="{{ route('transactions.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        Transactions
                    </a>
                    <a href="{{ route('budgets.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        Budgets
                    </a>
                    <a href="{{ route('reports.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        Reports
                    </a>
                    
                    @can('view-supervisor-panel')
                    <a href="{{ route('supervisor.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-blue-400 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">
                        Admin
                    </a>
                    @endcan
                </div>
                
                <!-- User Menu & Theme Toggle -->
                <div class="flex items-center space-x-4">
                    <!-- Theme Toggle -->
                    @include('components.theme-toggle')
                    
                    <span class="text-sm text-gray-700 dark:text-gray-300">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-blue-400 transition-colors duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu button -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="block px-4 py-2 text-gray-700 dark:text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>
    
    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-50">Dashboard</a>
            <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-50">Expenses</a>
            <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-50">Budgets</a>
            <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-50">Reports</a>
            
            @can('view-supervisor-panel')
            <a href="{{ route('supervisor.index') }}" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">Admin</a>
            @endcan
        </div>
    </div>
    
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-800 dark:text-green-200">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-700 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.098 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-800 dark:text-red-200">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif
        
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="text-center text-sm text-gray-600">
                <p>&copy; {{ date('Y') }} CashCast. Built with Laravel {{ app()->version() }}</p>
            </div>
        </div>
    </footer>
    
    <!-- Simple JavaScript for Mobile Menu -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const menu = document.getElementById('mobile-menu');
            const button = document.getElementById('mobile-menu-button');
            
            if (!menu.contains(e.target) && !button.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
