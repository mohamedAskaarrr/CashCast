<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - FinanceMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #0f172a 60%, #1e1b4b);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 2rem;
            overflow: hidden;
        }

        .quote {
            position: absolute;
            left: 2rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.5rem;
            max-width: 300px;
            color: #c4b5fd;
            font-style: italic;
            line-height: 1.5;
        }

        .auth-box {
            background-color: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(20px);
            padding: 2rem;
            border-radius: 1.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            animation: fadeIn 1s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
    </style>
</head>
<body>
    <div class="quote">
        "Take control of your money, or the lack of it will control you."
    </div>

    <div class="auth-box">
        @yield('content')
    </div>
</body>
</html>
