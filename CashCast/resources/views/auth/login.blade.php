@extends('layouts.app')
@section('title', 'Login')

@section('content')
    <h2 class="text-3xl font-semibold text-purple-300 mb-1">Welcome Back :)</h2>
    <p class="text-sm text-purple-100 mb-6">Login with your email & password</p>

    <form method="POST" action="/login" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm text-purple-200 mb-1">Email</label>
            <input type="email" name="email" placeholder="your@email.com"
                class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-purple-300 border border-purple-400 focus:ring-2 focus:ring-purple-500 outline-none" required>
        </div>

        <div>
            <label class="block text-sm text-purple-200 mb-1">Password</label>
            <input type="password" name="password" placeholder="••••••••"
                class="w-full px-4 py-3 rounded-xl bg-white/10 text-white placeholder-purple-300 border border-purple-400 focus:ring-2 focus:ring-purple-500 outline-none" required>
        </div>

        <div class="flex justify-between text-sm text-purple-200">
            <label><input type="checkbox" class="mr-1"> Remember me</label>
            <a href="#" class="hover:underline text-purple-300">Forgot password?</a>
        </div>

        <button type="submit"
            class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-500 to-indigo-600 text-white font-semibold shadow-xl hover:scale-105 transition">
            Login
        </button>

        <p class="text-center mt-4 text-sm text-purple-200">Don't have an account?
            <a href="/register" class="text-purple-300 underline">Join</a>
        </p>
    </form>
@endsection
