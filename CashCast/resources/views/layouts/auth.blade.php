<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - MyApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: radial-gradient(circle at top left, #1e1b4b, #1e1b4b 30%, #0f172a 100%);
            background-attachment: fixed;
            background-size: cover;
            color: white;
            overflow: hidden;
        }

        .glow {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(168,85,247,0.4), transparent 70%);
            filter: blur(120px);
            animation: floatGlow 10s ease-in-out infinite;
        }

        @keyframes floatGlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-30px); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-out forwards;
        }
    </style>
</head>
<body class="w-full h-screen flex items-center justify-center relative">
    <div class="glow top-[-100px] left-[-100px] z-0"></div>
    <div class="glow bottom-[-100px] right-[-100px] z-0"></div>

    <div class="relative z-10 w-full h-full p-8 bg-white/10 backdrop-blur-lg shadow-xl animate-fadeIn flex flex-col justify-center">
        @yield('content')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('button').forEach(btn => {
                btn.addEventListener('mouseover', () => btn.classList.add('scale-105'));
                btn.addEventListener('mouseout', () => btn.classList.remove('scale-105'));
            });
        });
    </script>
    
    @if(auth()->user()->hasRole('admin'))
    <a href="{{ route('supervisors.superVisor') }}"
    class="inline-block bg-purple-600 px-4 py-2 text-white rounded shadow hover:bg-purple-700 transition mb-4">
    Supervisor Panel
    </a>
    @endif

</body>
</html>
