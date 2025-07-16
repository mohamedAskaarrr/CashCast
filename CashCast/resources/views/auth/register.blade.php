@extends('layouts.app')

@section('title', 'Register')

@section('hero-title', 'Join CashCast!')
@section('hero-subtitle', 'Start your financial transformation journey today! Our AI assistant will guide you to better money management and financial success.')

@section('content')
    <!-- 🎨 Aurora Register Form - Improved Layout -->
    <div class="text-center mb-10">
        <h2 class="text-4xl font-bold mb-3">
            <span class="bg-gradient-to-r from-emerald-400 via-teal-500 to-cyan-600 bg-clip-text text-transparent">
                Create Account
            </span>
        </h2>
        <p class="text-gray-300 text-lg max-w-md mx-auto leading-relaxed">
            Join thousands of users taking control of their finances with our AI-powered insights
        </p>
    </div>

    <form method="POST" action="/register" class="space-y-6">
        @csrf
        
        <!-- Name Field -->
        <div class="space-y-3">
            <label class="flex items-center text-sm font-medium text-gray-300 mb-2">
                <svg class="w-4 h-4 mr-2 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
                Full Name
            </label>
            <input type="text" 
                   name="name" 
                   placeholder="Enter your full name"
                   class="w-full px-5 py-4 bg-gray-800/50 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
                   required>
        </div>

        <!-- Email Field -->
        <div class="space-y-3">
            <label class="flex items-center text-sm font-medium text-gray-300 mb-2">
                <svg class="w-4 h-4 mr-2 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                Email Address
            </label>
            <input type="email" 
                   name="email" 
                   placeholder="Enter your email address"
                   class="w-full px-5 py-4 bg-gray-800/50 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
                   required>
        </div>

        <!-- Password Field -->
        <div class="space-y-3">
            <label class="flex items-center text-sm font-medium text-gray-300 mb-2">
                <svg class="w-4 h-4 mr-2 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
                Password
            </label>
            <input type="password" 
                   name="password" 
                   placeholder="Create a strong password"
                   class="w-full px-5 py-4 bg-gray-800/50 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
                   required>
            <div class="text-xs text-gray-400 mt-2 flex items-center">
                <svg class="w-3 h-3 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
                Use 8+ characters with a mix of letters, numbers & symbols
            </div>
        </div>

        <!-- Confirm Password Field -->
        <div class="space-y-3">
            <label class="flex items-center text-sm font-medium text-gray-300 mb-2">
                <svg class="w-4 h-4 mr-2 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                </svg>
                Confirm Password
            </label>
            <input type="password" 
                   name="password_confirmation" 
                   placeholder="Confirm your password"
                   class="w-full px-5 py-4 bg-gray-800/50 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:border-emerald-500 transition-all duration-300 backdrop-blur-sm"
                   required>
        </div>

        <!-- Terms & Conditions -->
        <div class="flex items-start space-x-3 p-4 bg-gray-800/30 rounded-xl border border-gray-700/50">
            <input type="checkbox" 
                   name="terms" 
                   class="w-4 h-4 rounded border-gray-600 bg-gray-700 text-emerald-500 focus:ring-emerald-500 focus:ring-2 mt-1"
                   required>
            <label class="text-sm text-gray-300 cursor-pointer leading-relaxed">
                I agree to the 
                <a href="#" class="text-emerald-400 hover:text-emerald-300 transition-colors font-medium">Terms of Service</a>
                and 
                <a href="#" class="text-emerald-400 hover:text-emerald-300 transition-colors font-medium">Privacy Policy</a>
            </label>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full relative overflow-hidden bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-emerald-500/50 focus:ring-offset-2 focus:ring-offset-gray-900 group">
            <span class="flex items-center justify-center relative z-10">
                <svg class="w-5 h-5 mr-2 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                </svg>
                Create My Account
            </span>
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-teal-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </button>

        <!-- Login Link -->
        <div class="text-center pt-8 border-t border-gray-700/50">
            <a href="/login" class="inline-flex items-center justify-center w-full py-3 px-4 bg-gray-800/50 border border-gray-700 rounded-xl text-emerald-400 hover:text-emerald-300 hover:bg-gray-700/50 transition-all duration-300 font-medium group">
                <svg class="w-4 h-4 mr-2 group-hover:-translate-x-1 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 102 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                You already have an account?
            </a>
        </div>
    </form>

    <!-- 🎭 Aurora Loading Overlay -->
    <div id="register-loading" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-gray-800/90 backdrop-blur-lg border border-gray-700 rounded-2xl p-8 text-center">
            <div class="w-16 h-16 border-4 border-emerald-500 border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
            <p class="text-white font-medium">Creating your account...</p>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show AI greeting for registration
        showAIGreeting('register');
        
        // Password strength indicator
        const passwordInput = document.querySelector('input[name="password"]');
        const confirmInput = document.querySelector('input[name="password_confirmation"]');
        
        function checkPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;
            return strength;
        }
        
        passwordInput.addEventListener('input', function() {
            const strength = checkPasswordStrength(this.value);
            const colors = ['#ef4444', '#f59e0b', '#eab308', '#10b981'];
            const labels = ['Weak', 'Fair', 'Good', 'Strong'];
            
            if (this.value.length > 0) {
                this.style.borderColor = colors[strength - 1] || '#ef4444';
                
                // Show strength indicator
                let indicator = document.getElementById('password-strength');
                if (!indicator) {
                    indicator = document.createElement('div');
                    indicator.id = 'password-strength';
                    indicator.className = 'text-xs mt-1 font-medium';
                    this.parentElement.appendChild(indicator);
                }
                indicator.textContent = `Password strength: ${labels[strength - 1] || 'Too weak'}`;
                indicator.style.color = colors[strength - 1] || '#ef4444';
            }
        });
        
        // Password confirmation validation
        confirmInput.addEventListener('input', function() {
            if (this.value !== passwordInput.value) {
                this.style.borderColor = '#ef4444';
                
                let indicator = document.getElementById('password-match');
                if (!indicator) {
                    indicator = document.createElement('div');
                    indicator.id = 'password-match';
                    indicator.className = 'text-xs mt-1 font-medium text-red-400';
                    this.parentElement.appendChild(indicator);
                }
                indicator.textContent = 'Passwords do not match';
            } else {
                this.style.borderColor = '#10b981';
                const indicator = document.getElementById('password-match');
                if (indicator) indicator.remove();
            }
        });
        
        // Enhanced form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            // Validate passwords match
            if (passwordInput.value !== confirmInput.value) {
                e.preventDefault();
                showAuroraToast('Passwords do not match!', 'error');
                return;
            }
            
            // Show loading state
            document.getElementById('register-loading').classList.remove('hidden');
            
            // Add success toast after successful registration (this would be handled by backend)
            setTimeout(() => {
                showAuroraToast('Account created successfully! Welcome to CashCast!', 'success');
            }, 1000);
        });
        
        // Add floating labels effect
        document.querySelectorAll('input[type="text"], input[type="email"], input[type="password"]').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.space-y-3').querySelector('label').style.color = '#10b981';
            });
            
            input.addEventListener('blur', function() {
                this.closest('.space-y-3').querySelector('label').style.color = 'rgba(209, 213, 219, 1)';
            });
        });
    });
</script>
@endpush
