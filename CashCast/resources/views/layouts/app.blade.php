<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'CashCast')</title>
    <style>
        body { font-family: sans-serif; margin: 2rem; }
        .nav { margin-bottom: 1rem; }
        .nav a { margin-right: 1rem; }
    </style>
</head>
<body>
    <div class="nav">
        @auth
            <form method="POST" action="/logout" style="display:inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth

        <a href="/dashboard">Dashboard</a>
        <a href="/transactions">Transactions</a>
    </div>

    <div>
        @yield('content')
    </div>
</body>
</html>
