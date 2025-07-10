    
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CashCast')</title>
    <style>
        body {
            margin: 0;
            background-color: #1c1f26;
            color: #f2f2f2;
            font-family: 'Segoe UI', sans-serif;
        }

        .nav {
            background-color: #292d36;
            padding: 1rem;
            display: flex;
            gap: 1rem;
        }

        .nav a, .nav form button {
            color: #f2f2f2;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .container {
            padding: 2rem;
        }

        .card {
            background-color: #2d313c;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        input, button {
            padding: 0.5rem;
            margin-top: 0.5rem;
            border-radius: 4px;
            border: none;
            font-size: 1rem;
        }

        button {
            background-color: #4c51bf;
            color: white;
            cursor: pointer;
        }

        input {
            width: 100%;
            margin-bottom: 1rem;
            background: #3b4049;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="nav">
        <a href="/dashboard">Dashboard</a>
        @auth
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth
    </div>

    <div class="container">
        @yield('content')
    </div>



<script>
    document.getElementById('add-btn')?.addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('modal').style.display = 'flex';
        
    });
</script>

@if(session('success'))
    <div style="position:fixed; bottom:1rem; right:1rem; background:#38a169; color:white; padding:1rem; border-radius:6px; z-index:9999;">
        {{ session('success') }}
    </div>
@endif
<script>
document.getElementById('transaction-form')?.addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = e.target;
    const data = new FormData(form);

    try {
        const response = await fetch('/transactions', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: data
        });

        const res = await response.json();

        if (response.ok) {
            form.reset();
            document.getElementById('modal').style.display = 'none';
            document.getElementById('toast').innerText = res.message || 'Transaction added!';
            document.getElementById('toast').style.display = 'block';
            setTimeout(() => document.getElementById('toast').style.display = 'none', 3000);
        } else {
            alert(res.message || 'Something went wrong.');
        }

    } catch (err) {
        alert('Unexpected error: ' + err.message);
    }
});
</script>




</body>
</html>
