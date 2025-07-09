@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="card">
    <h2>Login</h2>
    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p style="margin-top: 1rem;">
        <a href="/register" style="color: #90cdf4;">Create an account</a>
    </p>
</div>
@endsection
