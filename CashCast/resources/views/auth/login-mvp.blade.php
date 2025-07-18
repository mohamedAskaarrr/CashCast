@extends('layouts.auth-mvp')

@section('title', 'Login')

@section('content')
<div class="space-y-6">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-900">Sign In</h2>
        <p class="text-gray-600 mt-2">Welcome back! Please sign in to your account.</p>
    </div>
    
    <!-- Login Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        
        <!-- Email Field -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                Email Address
            </label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                value="{{ old('email') }}"
                class="form-input @error('email') border-red-500 @enderror"
                placeholder="Enter your email"
                required
                autofocus
            >
            @error('email')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Password Field -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                Password
            </label>
            <input 
                type="password" 
                id="password" 
                name="password" 
                class="form-input @error('password') border-red-500 @enderror"
                placeholder="Enter your password"
                required
            >
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input 
                    type="checkbox" 
                    name="remember" 
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <span class="ml-2 text-sm text-gray-700">Remember me</span>
            </label>
            
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500">
                    Forgot password?
                </a>
            @endif
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="btn-primary">
            Sign In
        </button>
    </form>
    
    <!-- Register Link -->
    <div class="text-center">
        <p class="text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-500 font-medium">
                Sign up here
            </a>
        </p>
    </div>
    
    <!-- Demo Credentials (MVP Only) -->
    <div class="bg-gray-50 rounded-md p-4">
        <p class="text-sm text-gray-600 font-medium mb-2">Demo Credentials:</p>
        <div class="text-xs text-gray-500 space-y-1">
            <p><strong>Admin:</strong> admin@example.com / password</p>
            <p><strong>User:</strong> user@example.com / password</p>
        </div>
    </div>
</div>
@endsection
