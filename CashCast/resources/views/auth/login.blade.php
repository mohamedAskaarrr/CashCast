@extends('layouts.app')

@section('title', 'Login')

@section('hero-title', 'Welcome Back!')
@section('hero-subtitle', 'Your AI financial assistant missed you! Let\'s continue building your path to financial success together.')

@section('content')
    <!-- 🎨 Aurora Login Form - Improved Layout -->
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold mb-3">
            <span class="bg-gradient-to-r from-blue-400 via-purple-500 to-blue-600 bg-clip-text text-transparent">
                Sign In
            </span>
        </h2>
        <p class="text-gray-300 text-lg max-w-md mx-auto leading-relaxed">
            Access your personalized financial dashboard and continue your journey to financial success
        </p>
    </div>

    <form method="POST" action="/login" class="space-y-8">
        @csrf
        
        <!-- Email Field -->
        <div class="space-y-3">
            <label class="flex items-center text-sm font-medium text-gray-300 mb-2">
                <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                </svg>
                Email Address
            </label>
            <input type="email" 
                   name="email" 
                   placeholder="Enter your email address"
                   class="w-full px-5 py-4 bg-gray-800/50 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all duration-300 backdrop-blur-sm"
                   required>
        </div>

        <!-- Password Field -->
        <div class="space-y-3">
            <label class="flex items-center text-sm font-medium text-gray-300 mb-2">
                <svg class="w-4 h-4 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                Password
            </label>
            <input type="password" 
                   name="password" 
                   placeholder="Enter your password"
                   class="w-full px-5 py-4 bg-gray-800/50 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all duration-300 backdrop-blur-sm"
                   required>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between pt-2">
            <label class="flex items-center space-x-3 cursor-pointer">
                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-600 bg-gray-700 text-blue-500 focus:ring-blue-500 focus:ring-2">
                <span class="text-gray-300 text-sm">Remember me</span>
            </label>
            <a href="#" class="text-blue-400 hover:text-blue-300 transition-colors text-sm font-medium">
                Forgot password?
            </a>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full relative overflow-hidden bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500/50 focus:ring-offset-2 focus:ring-offset-gray-900 group">
            <span class="flex items-center justify-center relative z-10">
                <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
                Sign In to Dashboard
            </span>
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </button>

        <!-- Register Link -->
        <div class="text-center pt-8 border-t border-gray-700/50">
            <p class="text-gray-400 mb-4 text-sm">
                Don't have an account yet?
            </p>
            <a href="/register" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors font-medium group">
                <svg class="w-4 h-4 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                Create New Account
            </a>
        </div>
    </form>

    <!-- 🎭 Aurora Loading Overlay -->
    <div id="login-loading" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-gray-800/90 backdrop-blur-lg border border-gray-700 rounded-2xl p-8 text-center">
            <div class="w-16 h-16 border-4 border-blue-500 border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
            <p class="text-white font-medium">Signing you in...</p>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show AI greeting for login
        showAIGreeting('login');
        
        // Enhanced form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            // Show loading state
            document.getElementById('login-loading').classList.remove('hidden');
            
            // Add success toast after successful login (this would be handled by backend)
            setTimeout(() => {
                showAuroraToast('Welcome back! Redirecting to dashboard...', 'success');
            }, 1000);
        });
        
        // Enhanced input interactions
        document.querySelectorAll('input[type="email"], input[type="password"]').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.space-y-3').querySelector('label').style.color = '#3b82f6';
            });
            
            input.addEventListener('blur', function() {
                this.closest('.space-y-3').querySelector('label').style.color = 'rgba(209, 213, 219, 1)';
            });
        });
    });
</script>
@endpush
