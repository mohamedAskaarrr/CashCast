@extends('layouts.auth-mvp')

@section('title', 'Register')

@section('content')
<div class="space-y-6">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-900">Create Account</h2>
        <p class="text-gray-600 mt-2">Join CashCast and start managing your finances better.</p>
    </div>
    
    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        
        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Full Name
            </label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                value="{{ old('name') }}"
                class="form-input @error('name') border-red-500 @enderror"
                placeholder="Enter your full name"
                required
                autofocus
            >
            @error('name')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
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
                placeholder="Create a password"
                required
            >
            @error('password')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Confirm Password Field -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                Confirm Password
            </label>
            <input 
                type="password" 
                id="password_confirmation" 
                name="password_confirmation" 
                class="form-input"
                placeholder="Confirm your password"
                required
            >
        </div>
        
        <!-- Terms Agreement -->
        <div class="flex items-start">
            <input 
                type="checkbox" 
                id="terms" 
                name="terms" 
                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 mt-1"
                required
            >
            <label for="terms" class="ml-2 text-sm text-gray-700">
                I agree to the 
                <a href="#" class="text-blue-600 hover:text-blue-500">Terms of Service</a>
                and 
                <a href="#" class="text-blue-600 hover:text-blue-500">Privacy Policy</a>
            </label>
        </div>
        
        <!-- Submit Button -->
        <button type="submit" class="btn-primary">
            Create Account
        </button>
    </form>
    
    <!-- Login Link -->
    <div class="text-center">
        <p class="text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-500 font-medium">
                Sign in here
            </a>
        </p>
    </div>
</div>
@endsection
