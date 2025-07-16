<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CashCast Aurora</title>
    
    <!-- � ========================================= -->
    <!-- �🎨 AURORA UI SYSTEM - Modern Design Framework -->
    <!-- 🌟 ========================================= -->
    <!-- 
        Aurora UI System v1.0
        A modern, animated, and visually stunning UI/UX framework
        Created for CashCast - Financial Management Platform
        
        Features:
        ✨ Animated backgrounds with aurora effects
        🎭 Smooth transitions and hover effects
        📱 Responsive design system
        🌈 Beautiful gradient color schemes
        🎯 Modern typography with Inter font
        💫 Particle animation system
        🔥 Toast notification system
        🎨 Card-based layouts with glass morphism
        📊 Chart.js integration for data visualization
        🎪 AOS (Animate On Scroll) animations
        🎭 Lottie animations support
    -->
    
    <!-- 📊 Chart.js for beautiful data visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    
    <!-- ✨ AOS (Animate On Scroll) for scroll animations -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- 🎭 Lottie for advanced animations -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    
    <!-- 🌟 CountUp.js for animated numbers -->
    <script src="https://cdn.jsdelivr.net/npm/countup.js@2.8.0/dist/countUp.umd.js"></script>
    
    <!-- 🎨 Tailwind CSS - Utility-first CSS framework -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'aurora-purple': '#8b5cf6',
                        'aurora-pink': '#ec4899',
                        'aurora-blue': '#3b82f6',
                        'aurora-indigo': '#6366f1',
                        'aurora-dark': '#0f172a',
                        'aurora-gray': '#1e293b'
                    },
                    animation: {
                        'aurora-pulse': 'auroraPulse 2s ease-in-out infinite',
                        'aurora-float': 'auroraFloat 6s ease-in-out infinite',
                        'aurora-glow': 'auroraGlow 15s ease-in-out infinite',
                        'aurora-background': 'auroraBackground 20s ease infinite'
                    },
                    fontFamily: {
                        'aurora': ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <!--  Google Fonts - Inter for modern typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- 🎨 Aurora UI System - Core Styles & Animations -->
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 25%, #312e81 50%, #1e1b4b 75%, #0f172a 100%);
            background-size: 400% 400%;
            animation: auroraBackground 20s ease infinite;
            color: white;
            overflow-x: hidden;
        }

        @keyframes auroraBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* 🌟 Aurora Particles System */
        .aurora-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .aurora-particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.8), transparent);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .aurora-particle:nth-child(1) { top: 20%; left: 20%; animation-delay: 0s; }
        .aurora-particle:nth-child(2) { top: 40%; left: 80%; animation-delay: 2s; }
        .aurora-particle:nth-child(3) { top: 60%; left: 40%; animation-delay: 4s; }
        .aurora-particle:nth-child(4) { top: 80%; left: 70%; animation-delay: 1s; }
        .aurora-particle:nth-child(5) { top: 30%; left: 60%; animation-delay: 3s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
        }

        /* 🌈 Aurora Glow Effects */
        .aurora-glow {
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            animation: auroraGlow 15s ease-in-out infinite;
            z-index: 0;
        }

        .aurora-glow-1 {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.3), transparent 70%);
            top: -200px;
            left: -200px;
            animation-delay: 0s;
        }

        .aurora-glow-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.2), transparent 70%);
            bottom: -100px;
            right: -100px;
            animation-delay: 5s;
        }

        .aurora-glow-3 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.25), transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 10s;
        }

        @keyframes auroraGlow {
            0%, 100% { 
                transform: translate(0, 0) scale(1);
                opacity: 0.3;
            }
            33% { 
                transform: translate(30px, -30px) scale(1.1);
                opacity: 0.6;
            }
            66% { 
                transform: translate(-30px, 30px) scale(0.9);
                opacity: 0.4;
            }
        }

        /* 🎯 Aurora Navigation */
        .aurora-nav {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .aurora-nav-item {
            position: relative;
            transition: all 0.3s ease;
        }

        .aurora-nav-item::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #8b5cf6, #ec4899);
            transform: translateX(-50%);
            transition: width 0.3s ease;
        }

        .aurora-nav-item:hover::before {
            width: 80%;
        }

        .aurora-nav-item:hover {
            transform: translateY(-2px);
            color: #8b5cf6;
        }

        /* 🚀 Aurora Buttons */
        .aurora-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .aurora-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .aurora-btn:hover::before {
            left: 100%;
        }

        .aurora-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4);
        }

        /* 🎨 Aurora Cards */
        .aurora-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .aurora-card:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(139, 92, 246, 0.3);
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        /* 📱 Aurora Responsive Design */
        @media (max-width: 768px) {
            .aurora-glow {
                width: 200px !important;
                height: 200px !important;
            }
            
            .aurora-nav {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                border-radius: 20px 20px 0 0;
            }
        }

        /* 🎭 Aurora Loading Animation */
        .aurora-loading {
            display: inline-block;
            width: 40px;
            height: 40px;
            border: 3px solid rgba(139, 92, 246, 0.3);
            border-radius: 50%;
            border-top-color: #8b5cf6;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* 💫 Aurora Fade In Animation */
        .aurora-fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: auroraFadeIn 0.8s ease-out forwards;
        }

        @keyframes auroraFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 🌟 Aurora Pulse Effect */
        .aurora-pulse {
            animation: auroraPulse 2s ease-in-out infinite;
        }

        @keyframes auroraPulse {
            0%, 100% { opacity: 0.7; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.05); }
        }

        /* 🎯 Aurora Focus States */
        .aurora-focus:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.3);
            border-color: #8b5cf6;
        }

        /* 🔥 Aurora Scroll Bar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #8b5cf6, #ec4899);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #7c3aed, #db2777);
        }

        /* 🎨 Aurora Utility Classes */
        .aurora-gradient-text {
            background: linear-gradient(135deg, #8b5cf6, #ec4899, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% 200%;
            animation: auroraGradientText 3s ease infinite;
        }

        @keyframes auroraGradientText {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .aurora-glass {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .aurora-glass-dark {
            backdrop-filter: blur(20px);
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .aurora-shadow {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .aurora-shadow-purple {
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4);
        }

        .aurora-shadow-pink {
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.4);
        }

        .aurora-border-gradient {
            border: 2px solid transparent;
            background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05)) padding-box,
                        linear-gradient(135deg, #8b5cf6, #ec4899, #3b82f6) border-box;
            border-radius: 12px;
        }

        /* 🎭 Aurora Hover Effects */
        .aurora-hover-scale:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        .aurora-hover-lift:hover {
            transform: translateY(-8px);
            transition: transform 0.3s ease;
        }

        .aurora-hover-glow:hover {
            box-shadow: 0 0 30px rgba(139, 92, 246, 0.5);
            transition: box-shadow 0.3s ease;
        }

        /* 🌟 Aurora Animations */
        @keyframes auroraFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @keyframes auroraSlideIn {
            from { 
                opacity: 0; 
                transform: translateX(-100px); 
            }
            to { 
                opacity: 1; 
                transform: translateX(0); 
            }
        }

        @keyframes auroraSlideUp {
            from { 
                opacity: 0; 
                transform: translateY(50px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        .aurora-slide-in {
            animation: auroraSlideIn 0.6s ease-out;
        }

        .aurora-slide-up {
            animation: auroraSlideUp 0.6s ease-out;
        }

        /* 🎯 Aurora Form Enhancements */
        .aurora-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .aurora-input:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
        }

        .aurora-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        /* 🚀 Aurora Performance Optimizations */
        .aurora-will-change {
            will-change: transform, opacity;
        }

        .aurora-gpu-accelerated {
            transform: translateZ(0);
            backface-visibility: hidden;
            perspective: 1000px;
        }

        /* 🎭 Aurora Dropdown Styles */
        .aurora-dropdown {
            position: relative;
        }

        .aurora-dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            margin-top: 0.5rem;
            min-width: 16rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px) scale(0.95);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 50;
        }

        .aurora-dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .aurora-dropdown-item {
            transition: all 0.2s ease;
            border-radius: 0.5rem;
        }

        .aurora-dropdown-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(4px);
        }

        .aurora-dropdown-item:hover .aurora-dropdown-icon {
            transform: scale(1.1);
        }

        .aurora-dropdown-icon {
            transition: transform 0.2s ease;
        }

        /* 🎨 Aurora Auth Layout Styles */
        .aurora-auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 25%, #312e81 50%, #1e1b4b 75%, #0f172a 100%);
            background-size: 400% 400%;
            animation: auroraBackground 20s ease infinite;
            position: relative;
            overflow: hidden;
        }

        .aurora-auth-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            padding: 2rem;
            max-width: 28rem;
            width: 100%;
            margin: 1rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            position: relative;
            z-index: 10;
        }

        .aurora-auth-hero {
            text-align: center;
            margin-bottom: 2rem;
        }

        .aurora-auth-hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #8b5cf6, #ec4899, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .aurora-auth-hero p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
        }

        .aurora-auth-illustration {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 100px;
            height: 100px;
            opacity: 0.8;
            animation: float 6s ease-in-out infinite;
        }

        .aurora-auth-input {
            width: 100%;
            padding: 1rem;
            border-radius: 0.75rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .aurora-auth-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.08);
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.2);
        }

        .aurora-auth-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .aurora-auth-button {
            width: 100%;
            padding: 1rem;
            border-radius: 0.75rem;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            border: none;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .aurora-auth-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.4);
        }

        .aurora-auth-button:active {
            transform: translateY(0);
        }

        .aurora-auth-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .aurora-auth-button:hover::before {
            left: 100%;
        }
    </style>
    
    @stack('styles')
</head>
<body class="relative">
    <!-- 🌟 Aurora Particles Background -->
    <div class="aurora-particles">
        <div class="aurora-particle"></div>
        <div class="aurora-particle"></div>
        <div class="aurora-particle"></div>
        <div class="aurora-particle"></div>
        <div class="aurora-particle"></div>
    </div>

    <!-- 🌈 Aurora Glow Effects -->
    <div class="aurora-glow aurora-glow-1"></div>
    <div class="aurora-glow aurora-glow-2"></div>
    <div class="aurora-glow aurora-glow-3"></div>

    <!-- 🧭 Aurora Navigation -->
    <nav class="aurora-nav fixed top-0 left-0 right-0 z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                </div>
                <span class="text-2xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">
                    CashCast
                </span>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-2 relative">
                <a href="/dashboard" class="aurora-nav-item px-4 py-2 text-white hover:text-purple-300 transition-colors">
                    <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Dashboard
                </a>

                <!-- 🎨 Aurora Features Dropdown -->
                <div class="relative aurora-dropdown">
                    <button class="aurora-nav-item px-4 py-2 text-white hover:text-purple-300 transition-colors flex items-center" onclick="toggleDropdown('features-dropdown')">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        Features
                        <svg class="w-4 h-4 ml-1 transition-transform duration-200" id="features-arrow" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="features-dropdown" class="aurora-dropdown-menu absolute top-full left-0 mt-2 w-64 opacity-0 invisible transform scale-95 transition-all duration-300 z-50">
                        <div class="aurora-glass p-4 rounded-xl border border-white/20 shadow-2xl">
                            <div class="space-y-2">
                                <a href="{{ route('aurora.demo') }}" class="aurora-dropdown-item flex items-center p-3 rounded-lg text-white hover:bg-white/10 transition-all duration-200">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Aurora Demo</p>
                                        <p class="text-sm text-gray-400">See UI components</p>
                                    </div>
                                </a>

                                <a href="#" class="aurora-dropdown-item flex items-center p-3 rounded-lg text-white hover:bg-white/10 transition-all duration-200">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Transactions</p>
                                        <p class="text-sm text-gray-400">Manage your finances</p>
                                    </div>
                                </a>

                                <a href="#" class="aurora-dropdown-item flex items-center p-3 rounded-lg text-white hover:bg-white/10 transition-all duration-200">
                                    <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Budgets</p>
                                        <p class="text-sm text-gray-400">Plan your spending</p>
                                    </div>
                                </a>

                                <a href="#" class="aurora-dropdown-item flex items-center p-3 rounded-lg text-white hover:bg-white/10 transition-all duration-200">
                                    <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-medium">Reports</p>
                                        <p class="text-sm text-gray-400">View analytics</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('supervisors.superVisor') }}" 
                       class="aurora-nav-item px-4 py-2 text-white hover:text-purple-300 transition-colors">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                        Supervisor
                    </a>
                @endif
            </div>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-full flex items-center justify-center">
                        <span class="text-sm font-bold text-white">{{ substr(auth()->user()->name, 0, 1) }}</span>
                    </div>
                    <span class="text-white font-medium">{{ auth()->user()->name }}</span>
                </div>
                
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="aurora-btn bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 px-4 py-2 rounded-lg text-white font-medium transition-all duration-300">
                        <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- 🎯 Main Content Area -->
    <main class="relative z-10 pt-24 min-h-screen">
        <div class="aurora-fade-in">
            @yield('content')
        </div>
    </main>

    <!-- 🔥 Aurora Success/Error Toast System -->
    <div id="aurora-toast-container" class="fixed top-20 right-6 z-50 space-y-4"></div>

    <!-- 🎭 Aurora Loading Overlay -->
    <div id="aurora-loading-overlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div class="aurora-card p-8 rounded-2xl text-center">
            <div class="aurora-loading mx-auto mb-4"></div>
            <p class="text-white font-medium">Loading...</p>
        </div>
    </div>

    <!-- 📱 Mobile Navigation -->
    <div class="md:hidden aurora-nav fixed bottom-0 left-0 right-0 z-50 px-4 py-3">
        <div class="flex items-center justify-around">
            <a href="/dashboard" class="flex flex-col items-center text-white hover:text-purple-300 transition-colors">
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                </svg>
                <span class="text-xs">Home</span>
            </a>
            <a href="#" class="flex flex-col items-center text-white hover:text-purple-300 transition-colors">
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
                <span class="text-xs">Wallet</span>
            </a>
            <a href="#" class="flex flex-col items-center text-white hover:text-purple-300 transition-colors">
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                </svg>
                <span class="text-xs">Stats</span>
            </a>
            <a href="#" class="flex flex-col items-center text-white hover:text-purple-300 transition-colors">
                <svg class="w-6 h-6 mb-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-xs">Profile</span>
            </a>
        </div>
    </div>

    <!-- 🎨 Aurora UI System JavaScript -->
    <script>
        // 🌟 Aurora UI System Global Configuration
        window.AuroraUI = {
            version: '1.0.0',
            theme: 'dark',
            animations: {
                duration: 800,
                easing: 'ease-in-out'
            },
            colors: {
                primary: '#8b5cf6',
                secondary: '#ec4899',
                accent: '#3b82f6',
                success: '#10b981',
                warning: '#f59e0b',
                error: '#ef4444'
            }
        };

        // 🚀 Initialize Aurora UI System
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🌟 Aurora UI System v1.0 Initialized');
            
            // Initialize AOS (Animate On Scroll)
            AOS.init({
                duration: AuroraUI.animations.duration,
                easing: AuroraUI.animations.easing,
                once: true,
                offset: 100,
                delay: 100
            });

            // 🎯 Aurora Button Effects
            document.querySelectorAll('.aurora-btn').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px) scale(1.02)';
                    this.style.transition = 'all 0.3s ease';
                });
                
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });

                btn.addEventListener('click', function() {
                    this.style.transform = 'translateY(0) scale(0.98)';
                    setTimeout(() => {
                        this.style.transform = 'translateY(-2px) scale(1.02)';
                    }, 150);
                });
            });

            // 🌟 Aurora Card Hover Effects
            document.querySelectorAll('.aurora-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-4px) scale(1.02)';
                    this.style.transition = 'all 0.3s ease';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // 🎭 Aurora Input Focus Effects
            document.querySelectorAll('.aurora-input').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                    this.parentElement.style.transition = 'all 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // 🌈 Aurora Gradient Text Animation
            document.querySelectorAll('.aurora-gradient-text').forEach(element => {
                element.style.backgroundSize = '200% 200%';
                element.style.animation = 'auroraGradientText 3s ease infinite';
            });

            // 🎯 Aurora Focus Management
            document.querySelectorAll('input, select, textarea, button').forEach(element => {
                element.classList.add('aurora-focus');
            });

            // 🚀 Aurora Performance Optimizations
            document.querySelectorAll('.aurora-card, .aurora-btn').forEach(element => {
                element.classList.add('aurora-will-change', 'aurora-gpu-accelerated');
            });
        });

        // 🔥 Aurora Loading System
        window.AuroraLoading = {
            show: function() {
                document.getElementById('aurora-loading-overlay').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            },
            hide: function() {
                document.getElementById('aurora-loading-overlay').classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
        };

        // 🎭 Aurora Toast System
        window.AuroraToast = {
            show: function(message, type = 'success', duration = 3000) {
                const toast = document.createElement('div');
                toast.className = `aurora-card p-4 rounded-xl border-l-4 ${this.getTypeClasses(type)} transform translate-x-full transition-all duration-300 aurora-slide-in`;
                
                toast.innerHTML = `
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            ${this.getIcon(type)}
                            <span class="text-white font-medium ml-3">${message}</span>
                        </div>
                        <button onclick="this.parentElement.parentElement.remove()" class="text-white hover:text-gray-300 ml-4">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                `;
                
                document.getElementById('aurora-toast-container').appendChild(toast);
                
                setTimeout(() => {
                    toast.style.transform = 'translateX(0)';
                }, 100);
                
                if (duration > 0) {
                    setTimeout(() => {
                        toast.style.transform = 'translateX(100%)';
                        setTimeout(() => toast.remove(), 300);
                    }, duration);
                }
            },
            
            getTypeClasses: function(type) {
                const classes = {
                    success: 'border-green-500 bg-green-500/10',
                    error: 'border-red-500 bg-red-500/10',
                    warning: 'border-yellow-500 bg-yellow-500/10',
                    info: 'border-blue-500 bg-blue-500/10'
                };
                return classes[type] || classes.success;
            },
            
            getIcon: function(type) {
                const icons = {
                    success: '<svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>',
                    error: '<svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>',
                    warning: '<svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>',
                    info: '<svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>'
                };
                return icons[type] || icons.success;
            }
        };

        // 🌟 Aurora Animation Utils
        window.AuroraAnimation = {
            fadeIn: function(element, duration = 500) {
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
                element.style.transition = `all ${duration}ms ease`;
                
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';
                }, 50);
            },
            
            slideIn: function(element, direction = 'left', duration = 500) {
                const transforms = {
                    left: 'translateX(-100px)',
                    right: 'translateX(100px)',
                    up: 'translateY(-100px)',
                    down: 'translateY(100px)'
                };
                
                element.style.opacity = '0';
                element.style.transform = transforms[direction];
                element.style.transition = `all ${duration}ms ease`;
                
                setTimeout(() => {
                    element.style.opacity = '1';
                    element.style.transform = 'translate(0)';
                }, 50);
            },
            
            countUp: function(element, endValue, duration = 2000) {
                if (typeof CountUp !== 'undefined') {
                    const countUp = new CountUp(element, endValue, {
                        duration: duration / 1000,
                        useEasing: true,
                        useGrouping: true,
                        separator: ',',
                        decimal: '.'
                    });
                    countUp.start();
                }
            }
        };

        // 💫 Aurora Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // 🌟 Aurora Particle System Enhancement
        function createAuroraParticle() {
            const particle = document.createElement('div');
            particle.className = 'aurora-particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 6 + 's';
            particle.style.animationDuration = (Math.random() * 4 + 4) + 's';
            
            const colors = ['#8b5cf6', '#ec4899', '#3b82f6', '#10b981'];
            const color = colors[Math.floor(Math.random() * colors.length)];
            particle.style.background = `radial-gradient(circle, ${color}80, transparent)`;
            
            document.querySelector('.aurora-particles').appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 8000);
        }

        // Add new particles periodically
        setInterval(createAuroraParticle, 3000);

        // 🎯 Aurora Performance Monitor
        window.AuroraPerformance = {
            init: function() {
                if (window.performance && window.performance.mark) {
                    window.performance.mark('aurora-ui-start');
                }
            },
            
            measure: function(name) {
                if (window.performance && window.performance.measure) {
                    window.performance.measure(name, 'aurora-ui-start');
                }
            }
        };

        // Initialize performance monitoring
        AuroraPerformance.init();

        // 🎨 Aurora Theme Manager
        window.AuroraTheme = {
            toggle: function() {
                const currentTheme = document.body.classList.contains('aurora-light') ? 'light' : 'dark';
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                
                document.body.classList.toggle('aurora-light');
                localStorage.setItem('aurora-theme', newTheme);
                
                AuroraToast.show(`Switched to ${newTheme} theme`, 'info');
            },
            
            init: function() {
                const savedTheme = localStorage.getItem('aurora-theme');
                if (savedTheme === 'light') {
                    document.body.classList.add('aurora-light');
                }
            }
        };

        // Initialize theme
        AuroraTheme.init();

        // 🌟 Aurora Accessibility
        window.AuroraA11y = {
            init: function() {
                // Add keyboard navigation
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Tab') {
                        document.body.classList.add('aurora-keyboard-nav');
                    }
                });
                
                document.addEventListener('mousedown', function() {
                    document.body.classList.remove('aurora-keyboard-nav');
                });
                
                // Add focus visible styles
                const style = document.createElement('style');
                style.textContent = `
                    .aurora-keyboard-nav *:focus {
                        outline: 2px solid #8b5cf6;
                        outline-offset: 2px;
                    }
                `;
                document.head.appendChild(style);
            }
        };

        // Initialize accessibility features
        AuroraA11y.init();

        // 🎭 Aurora Dropdown System
        window.toggleDropdown = function(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const arrow = document.getElementById(dropdownId.replace('-dropdown', '-arrow'));
            
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
                if (arrow) arrow.style.transform = 'rotate(0deg)';
            } else {
                // Close other dropdowns
                document.querySelectorAll('.aurora-dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
                document.querySelectorAll('[id$="-arrow"]').forEach(arrow => {
                    arrow.style.transform = 'rotate(0deg)';
                });
                
                // Open current dropdown
                dropdown.classList.add('show');
                if (arrow) arrow.style.transform = 'rotate(180deg)';
            }
        };

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.aurora-dropdown')) {
                document.querySelectorAll('.aurora-dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                });
                document.querySelectorAll('[id$="-arrow"]').forEach(arrow => {
                    arrow.style.transform = 'rotate(0deg)';
                });
            }
        });

        // 🎯 Aurora Auth Form Enhancements
        window.initAuroraAuth = function() {
            // Add focus effects to auth forms
            document.querySelectorAll('.aurora-auth-input').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                    this.parentElement.style.transition = 'all 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Add success animation to auth buttons
            document.querySelectorAll('.aurora-auth-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    if (this.type === 'submit') {
                        // Create ripple effect
                        const ripple = document.createElement('span');
                        ripple.style.position = 'absolute';
                        ripple.style.borderRadius = '50%';
                        ripple.style.background = 'rgba(255, 255, 255, 0.6)';
                        ripple.style.transform = 'scale(0)';
                        ripple.style.animation = 'ripple 0.6s linear';
                        
                        const rect = this.getBoundingClientRect();
                        const size = Math.max(rect.width, rect.height);
                        ripple.style.width = ripple.style.height = size + 'px';
                        ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
                        ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
                        
                        this.appendChild(ripple);
                        
                        setTimeout(() => ripple.remove(), 600);
                    }
                });
            });
        };

        // 🌟 Aurora AI Assistant
        window.AuroraAI = {
            greetings: [
                "Welcome back! Ready to manage your finances?",
                "Hello! Let's make your money work smarter.",
                "Great to see you! Your financial journey continues.",
                "Welcome! Time to take control of your finances.",
                "Hello there! Let's achieve your financial goals together."
            ],
            
            newUserGreetings: [
                "Welcome to CashCast! Let's get your finances organized.",
                "Hello! Ready to start your financial journey?",
                "Welcome aboard! Let's make money management easy.",
                "Great to have you! Your path to financial success starts here.",
                "Hello! Ready to transform how you handle money?"
            ],
            
            getGreeting: function(isNewUser = false) {
                const greetings = isNewUser ? this.newUserGreetings : this.greetings;
                return greetings[Math.floor(Math.random() * greetings.length)];
            },
            
            showWelcome: function(isNewUser = false) {
                const greeting = this.getGreeting(isNewUser);
                setTimeout(() => {
                    AuroraToast.show(greeting, 'info', 5000);
                }, 1000);
            }
        };

        // Add ripple animation keyframes
        const rippleStyle = document.createElement('style');
        rippleStyle.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(rippleStyle);

        // 🎭 Aurora Ready Event
        window.addEventListener('load', function() {
            AuroraPerformance.measure('aurora-ui-load');
            console.log('✨ Aurora UI System fully loaded and ready!');
            
            // Dispatch custom event
            window.dispatchEvent(new CustomEvent('aurora:ready', {
                detail: { version: AuroraUI.version }
            }));
        });
    </script>
    
    @stack('scripts')
</body>
</html>
