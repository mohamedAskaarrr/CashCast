@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <h2 class="text-3xl font-semibold text-purple-300 mb-1">Create Account</h2>
    <p class="text-sm text-purple-100 mb-6">Sign up with your personal information</p>

    <form method="POST" action="/register" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm text-purple-200 mb-1">Name</label>
            <input type="text" name="name" placeholder="Full Name"
                class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-purple-300 border border-purple-400 focus:ring-2 focus:ring-purple-500 outline-none" required>
        </div>

        <div>
            <label class="block text-sm text-purple-200 mb-1">Email</label>
            <input type="email" name="email" placeholder="email@example.com"
                class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-purple-300 border border-purple-400 focus:ring-2 focus:ring-purple-500 outline-none" required>
        </div>

        <div>
            <label class="block text-sm text-purple-200 mb-1">Password</label>
            <input type="password" name="password" placeholder="••••••••"
                class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-purple-300 border border-purple-400 focus:ring-2 focus:ring-purple-500 outline-none" required>
        </div>

        <div>
            <label class="block text-sm text-purple-200 mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="••••••••"
                class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-purple-300 border border-purple-400 focus:ring-2 focus:ring-purple-500 outline-none" required>
        </div>

        <button type="submit"
            class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold shadow-xl hover:scale-105 transition">
            Register
        </button>

        <p class="text-center mt-4 text-sm text-purple-200">Already have an account?
            <a href="/login" class="text-purple-300 underline">Login</a>
        </p>
    </form>
@endsection
