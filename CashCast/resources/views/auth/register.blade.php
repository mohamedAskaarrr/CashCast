@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="card">
    <h2>Register</h2>
    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
    <p style="margin-top: 1rem;">
        <a href="/login" style="color: #90cdf4;">Already have an account?</a>
    </p>
</div>
@endsection
