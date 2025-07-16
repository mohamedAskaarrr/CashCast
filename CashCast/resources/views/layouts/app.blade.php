<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - CashCast Aurora</title>
    
    <!-- 🌟 Aurora UI System - Authentication Layout -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'aurora-purple': '#8b5cf6',
                        'aurora-pink': '#ec4899',
                        'aurora-blue': '#3b82f6',
                        'aurora-dark': '#0f172a',
                        'aurora-gray': '#1e293b'
                    }
                }
            }
        }
    </script>
    
    <!-- 🔤 Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- ✨ AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- 🎭 Lottie for animations -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 25%, #312e81 50%, #1e1b4b 75%, #0f172a 100%);
            background-size: 400% 400%;
            animation: auroraBackground 20s ease infinite;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            overflow: hidden;
            position: relative;
        }

        @keyframes auroraBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* 🌟 Aurora Particles */
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
            animation: float 8s ease-in-out infinite;
        }

        .aurora-particle:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
        .aurora-particle:nth-child(2) { top: 20%; left: 80%; animation-delay: 2s; }
        .aurora-particle:nth-child(3) { top: 60%; left: 20%; animation-delay: 4s; }
        .aurora-particle:nth-child(4) { top: 80%; left: 70%; animation-delay: 1s; }
        .aurora-particle:nth-child(5) { top: 40%; left: 60%; animation-delay: 3s; }
        .aurora-particle:nth-child(6) { top: 70%; left: 40%; animation-delay: 5s; }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-30px) rotate(180deg); opacity: 1; }
        }

        /* 🌈 Aurora Glow Effects */
        .aurora-glow {
            position: fixed;
            border-radius: 50%;
            filter: blur(120px);
            animation: auroraGlow 20s ease-in-out infinite;
            z-index: 0;
        }

        .aurora-glow-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.3), transparent 70%);
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        .aurora-glow-2 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.2), transparent 70%);
            bottom: -50px;
            right: -50px;
            animation-delay: 7s;
        }

        .aurora-glow-3 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.25), transparent 70%);
            top: 30%;
            left: 70%;
            animation-delay: 14s;
        }

        @keyframes auroraGlow {
            0%, 100% { 
                transform: translate(0, 0) scale(1);
                opacity: 0.3;
            }
            33% { 
                transform: translate(20px, -20px) scale(1.1);
                opacity: 0.6;
            }
            66% { 
                transform: translate(-20px, 20px) scale(0.9);
                opacity: 0.4;
            }
        }

        /* 🎨 Aurora Auth Container */
        .aurora-auth-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }

        .aurora-auth-layout {
            display: grid;
            grid-template-columns: 1fr 480px;
            gap: 8rem;
            max-width: 1400px;
            width: 100%;
            align-items: center;
        }

        @media (max-width: 1200px) {
            .aurora-auth-layout {
                grid-template-columns: 1fr;
                gap: 4rem;
                text-align: center;
                max-width: 560px;
            }
        }

        /* 🎭 Aurora Hero Section */
        .aurora-hero {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            position: relative;
            padding: 2rem;
        }

        @media (max-width: 1200px) {
            .aurora-hero {
                align-items: center;
                text-align: center;
                padding: 1rem;
            }
        }

        .aurora-hero-title {
            font-size: 4rem;
            font-weight: 900;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 50%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }

        .aurora-hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2.5rem;
            max-width: 480px;
            line-height: 1.6;
        }

        /* 🤖 Aurora AI Assistant */
        .aurora-ai-assistant {
            width: 280px;
            height: 280px;
            margin: 0 0 2rem 0;
            position: relative;
            border-radius: 50%;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 50%, #06b6d4 100%);
            padding: 6px;
            animation: aiPulse 4s ease-in-out infinite;
        }

        @media (max-width: 1200px) {
            .aurora-ai-assistant {
                width: 200px;
                height: 200px;
                margin: 0 auto 2rem;
            }
        }

        .aurora-ai-avatar {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #1e3a8a 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        @keyframes aiPulse {
            0%, 100% { 
                transform: scale(1); 
                box-shadow: 0 0 0 0 rgba(139, 92, 246, 0.4);
            }
            50% { 
                transform: scale(1.03); 
                box-shadow: 0 0 0 30px rgba(139, 92, 246, 0);
            }
        }

        /* 🎨 Aurora Auth Card */
        .aurora-auth-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 2rem;
            padding: 3.5rem;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            position: relative;
            margin: 0 auto;
            transition: all 0.3s ease;
        }

        .aurora-auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 70px rgba(0, 0, 0, 0.6);
            border-color: rgba(139, 92, 246, 0.3);
        }

        .aurora-auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(236, 72, 153, 0.1));
            border-radius: 2rem;
            z-index: -1;
        }

        .aurora-auth-form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .aurora-auth-form-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .aurora-auth-form-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        .aurora-auth-input-group {
            margin-bottom: 1.5rem;
        }

        .aurora-auth-label {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 0.5rem;
        }

        .aurora-auth-label svg {
            margin-right: 0.5rem;
            color: #8b5cf6;
        }

        .aurora-auth-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.07);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .aurora-auth-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.1);
            border-color: #8b5cf6;
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.15);
            transform: translateY(-1px);
        }

        .aurora-auth-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .aurora-auth-button {
            width: 100%;
            padding: 1.25rem;
            border-radius: 1rem;
            background: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            border: none;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-top: 1rem;
        }

        .aurora-auth-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(139, 92, 246, 0.4);
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

        .aurora-auth-extras {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 1.5rem 0;
            font-size: 0.85rem;
        }

        .aurora-auth-checkbox {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.7);
        }

        .aurora-auth-checkbox input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            margin-right: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
        }

        .aurora-auth-link {
            color: #8b5cf6;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .aurora-auth-link:hover {
            color: #ec4899;
        }

        .aurora-auth-divider {
            margin: 2rem 0;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .aurora-auth-switch {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .aurora-auth-switch-link {
            display: inline-flex;
            align-items: center;
            color: #8b5cf6;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .aurora-auth-switch-link:hover {
            color: #ec4899;
            transform: translateX(2px);
        }

        .aurora-auth-switch-link svg {
            margin-right: 0.5rem;
        }

        /* 🎯 Aurora Fade In Animation */
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

        /* 🔥 Aurora Toast Container */
        .aurora-toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .aurora-toast-container > * + * {
            margin-top: 1rem;
        }

        .aurora-toast {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.75rem;
            padding: 1rem;
            color: white;
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }

        .aurora-toast.show {
            transform: translateX(0);
        }

        /* 📱 Responsive Design */
        @media (max-width: 768px) {
            .aurora-hero-title {
                font-size: 2.5rem;
            }
            
            .aurora-ai-assistant {
                width: 150px;
                height: 150px;
            }
            
            .aurora-auth-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- 🌟 Aurora Particles Background -->
    <div class="aurora-particles">
        <div class="aurora-particle"></div>
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

    <!-- 🎭 Aurora Toast Container -->
    <div id="aurora-toast-container" class="aurora-toast-container"></div>

    <!-- 🎨 Main Auth Container -->
    <div class="aurora-auth-container">
        <div class="aurora-auth-layout">
            <!-- 🤖 AI Assistant Hero Section -->
            <div class="aurora-hero aurora-fade-in">
                <div class="aurora-ai-assistant">
                    <div class="aurora-ai-avatar">
                        @if(Request::is('login'))
                            <!-- Login AI Assistant - Professional & Welcoming -->
                            <svg width="160" height="160" viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Background Circle -->
                                <circle cx="80" cy="80" r="70" fill="url(#loginBgGradient)" stroke="url(#loginBorderGradient)" stroke-width="2"/>
                                
                                <!-- AI Face -->
                                <circle cx="80" cy="80" r="55" fill="url(#loginFaceGradient)" stroke="rgba(59, 130, 246, 0.3)" stroke-width="1"/>
                                
                                <!-- Eyes -->
                                <circle cx="65" cy="68" r="8" fill="url(#loginEyeGradient)"/>
                                <circle cx="95" cy="68" r="8" fill="url(#loginEyeGradient)"/>
                                <circle cx="67" cy="66" r="3" fill="white" opacity="0.9"/>
                                <circle cx="97" cy="66" r="3" fill="white" opacity="0.9"/>
                                
                                <!-- Welcoming Smile -->
                                <path d="M60 92 Q80 108 100 92" stroke="url(#loginSmileGradient)" stroke-width="4" fill="none" stroke-linecap="round"/>
                                
                                <!-- Dashboard Elements -->
                                <g opacity="0.7">
                                    <rect x="25" y="25" width="8" height="8" rx="2" fill="#3b82f6"/>
                                    <rect x="25" y="37" width="12" height="2" rx="1" fill="#60a5fa"/>
                                    <rect x="25" y="41" width="8" height="2" rx="1" fill="#93c5fd"/>
                                    
                                    <rect x="127" y="25" width="8" height="8" rx="2" fill="#8b5cf6"/>
                                    <rect x="123" y="37" width="12" height="2" rx="1" fill="#a78bfa"/>
                                    <rect x="127" y="41" width="8" height="2" rx="1" fill="#c4b5fd"/>
                                    
                                    <rect x="25" y="127" width="8" height="8" rx="2" fill="#06b6d4"/>
                                    <rect x="25" y="115" width="12" height="2" rx="1" fill="#67e8f9"/>
                                    <rect x="25" y="119" width="8" height="2" rx="1" fill="#a5f3fc"/>
                                    
                                    <rect x="127" y="127" width="8" height="8" rx="2" fill="#3b82f6"/>
                                    <rect x="123" y="115" width="12" height="2" rx="1" fill="#60a5fa"/>
                                    <rect x="127" y="119" width="8" height="2" rx="1" fill="#93c5fd"/>
                                </g>
                                
                                <!-- Floating Data Points -->
                                <g opacity="0.8">
                                    <circle cx="50" cy="50" r="2" fill="#3b82f6">
                                        <animate attributeName="opacity" values="0.3;1;0.3" dur="2s" repeatCount="indefinite"/>
                                    </circle>
                                    <circle cx="110" cy="50" r="2" fill="#8b5cf6">
                                        <animate attributeName="opacity" values="1;0.3;1" dur="2s" repeatCount="indefinite"/>
                                    </circle>
                                    <circle cx="50" cy="110" r="2" fill="#06b6d4">
                                        <animate attributeName="opacity" values="0.3;1;0.3" dur="2s" repeatCount="indefinite" begin="0.5s"/>
                                    </circle>
                                    <circle cx="110" cy="110" r="2" fill="#3b82f6">
                                        <animate attributeName="opacity" values="1;0.3;1" dur="2s" repeatCount="indefinite" begin="0.5s"/>
                                    </circle>
                                </g>
                                
                                <!-- Gradient Definitions -->
                                <defs>
                                    <linearGradient id="loginBgGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#1e3a8a;stop-opacity:0.8"/>
                                        <stop offset="50%" style="stop-color:#3730a3;stop-opacity:0.6"/>
                                        <stop offset="100%" style="stop-color:#1e40af;stop-opacity:0.8"/>
                                    </linearGradient>
                                    <linearGradient id="loginBorderGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:0.8"/>
                                        <stop offset="100%" style="stop-color:#8b5cf6;stop-opacity:0.8"/>
                                    </linearGradient>
                                    <linearGradient id="loginFaceGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#1e40af;stop-opacity:0.9"/>
                                        <stop offset="100%" style="stop-color:#3730a3;stop-opacity:0.7"/>
                                    </linearGradient>
                                    <linearGradient id="loginEyeGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#60a5fa"/>
                                        <stop offset="100%" style="stop-color:#3b82f6"/>
                                    </linearGradient>
                                    <linearGradient id="loginSmileGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#60a5fa"/>
                                        <stop offset="100%" style="stop-color:#3b82f6"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        @else
                            <!-- Register AI Assistant - Friendly & Encouraging -->
                            <svg width="160" height="160" viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Background Circle -->
                                <circle cx="80" cy="80" r="70" fill="url(#registerBgGradient)" stroke="url(#registerBorderGradient)" stroke-width="2"/>
                                
                                <!-- AI Face -->
                                <circle cx="80" cy="80" r="55" fill="url(#registerFaceGradient)" stroke="rgba(16, 185, 129, 0.3)" stroke-width="1"/>
                                
                                <!-- Eyes -->
                                <circle cx="65" cy="68" r="8" fill="url(#registerEyeGradient)"/>
                                <circle cx="95" cy="68" r="8" fill="url(#registerEyeGradient)"/>
                                <circle cx="67" cy="66" r="3" fill="white" opacity="0.9"/>
                                <circle cx="97" cy="66" r="3" fill="white" opacity="0.9"/>
                                
                                <!-- Excited Smile -->
                                <path d="M58 90 Q80 112 102 90" stroke="url(#registerSmileGradient)" stroke-width="4" fill="none" stroke-linecap="round"/>
                                
                                <!-- Growth Elements -->
                                <g opacity="0.7">
                                    <!-- Growth arrows -->
                                    <path d="M30 40 L30 30 L35 35 L30 30 L25 35" stroke="#10b981" stroke-width="2" fill="none" stroke-linecap="round"/>
                                    <path d="M130 40 L130 30 L135 35 L130 30 L125 35" stroke="#14b8a6" stroke-width="2" fill="none" stroke-linecap="round"/>
                                    <path d="M30 130 L30 120 L35 125 L30 120 L25 125" stroke="#0d9488" stroke-width="2" fill="none" stroke-linecap="round"/>
                                    <path d="M130 130 L130 120 L135 125 L130 120 L125 125" stroke="#10b981" stroke-width="2" fill="none" stroke-linecap="round"/>
                                    
                                    <!-- Progress bars -->
                                    <rect x="22" y="50" width="16" height="3" rx="1.5" fill="#065f46"/>
                                    <rect x="22" y="50" width="12" height="3" rx="1.5" fill="#10b981"/>
                                    
                                    <rect x="122" y="50" width="16" height="3" rx="1.5" fill="#065f46"/>
                                    <rect x="122" y="50" width="10" height="3" rx="1.5" fill="#14b8a6"/>
                                </g>
                                
                                <!-- Floating Success Elements -->
                                <g opacity="0.8">
                                    <circle cx="45" cy="45" r="2" fill="#10b981">
                                        <animate attributeName="opacity" values="0.3;1;0.3" dur="2s" repeatCount="indefinite"/>
                                    </circle>
                                    <circle cx="115" cy="45" r="2" fill="#14b8a6">
                                        <animate attributeName="opacity" values="1;0.3;1" dur="2s" repeatCount="indefinite"/>
                                    </circle>
                                    <circle cx="45" cy="115" r="2" fill="#0d9488">
                                        <animate attributeName="opacity" values="0.3;1;0.3" dur="2s" repeatCount="indefinite" begin="0.5s"/>
                                    </circle>
                                    <circle cx="115" cy="115" r="2" fill="#10b981">
                                        <animate attributeName="opacity" values="1;0.3;1" dur="2s" repeatCount="indefinite" begin="0.5s"/>
                                    </circle>
                                </g>
                                
                                <!-- Gradient Definitions -->
                                <defs>
                                    <linearGradient id="registerBgGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#064e3b;stop-opacity:0.8"/>
                                        <stop offset="50%" style="stop-color:#0f766e;stop-opacity:0.6"/>
                                        <stop offset="100%" style="stop-color:#065f46;stop-opacity:0.8"/>
                                    </linearGradient>
                                    <linearGradient id="registerBorderGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#10b981;stop-opacity:0.8"/>
                                        <stop offset="100%" style="stop-color:#14b8a6;stop-opacity:0.8"/>
                                    </linearGradient>
                                    <linearGradient id="registerFaceGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#065f46;stop-opacity:0.9"/>
                                        <stop offset="100%" style="stop-color:#0f766e;stop-opacity:0.7"/>
                                    </linearGradient>
                                    <linearGradient id="registerEyeGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#34d399"/>
                                        <stop offset="100%" style="stop-color:#10b981"/>
                                    </linearGradient>
                                    <linearGradient id="registerSmileGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#34d399"/>
                                        <stop offset="100%" style="stop-color:#10b981"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                        @endif
                    </div>
                </div>
                
                <h1 class="aurora-hero-title">
                    @yield('hero-title', 'Welcome to CashCast')
                </h1>
                <p class="aurora-hero-subtitle">
                    @yield('hero-subtitle', 'Your AI-powered financial companion is here to help you take control of your money and achieve your financial goals.')
                </p>
            </div>

            <!-- 🎯 Auth Form Section -->
            <div class="aurora-fade-in" style="animation-delay: 0.3s;">
                <div class="aurora-auth-card">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- 🎨 Aurora JavaScript -->
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Aurora Toast System
        function showAuroraToast(message, type = 'info') {
            const container = document.getElementById('aurora-toast-container');
            const toast = document.createElement('div');
            toast.className = `aurora-toast ${type}`;
            
            const colors = {
                success: 'border-green-500 bg-green-500/10',
                error: 'border-red-500 bg-red-500/10',
                info: 'border-blue-500 bg-blue-500/10',
                warning: 'border-yellow-500 bg-yellow-500/10'
            };
            
            const icons = {
                success: '✅',
                error: '❌',
                info: '💡',
                warning: '⚠️'
            };
            
            toast.innerHTML = `
                <div class="flex items-center">
                    <span class="text-2xl mr-3">${icons[type]}</span>
                    <span>${message}</span>
                </div>
            `;
            
            toast.classList.add(colors[type]);
            container.appendChild(toast);
            
            setTimeout(() => toast.classList.add('show'), 100);
            
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 300);
            }, 4000);
        }

        // Aurora AI Greetings
        const aiGreetings = {
            login: [
                "Welcome back! Ready to manage your finances? 💰",
                "Hello again! Your financial journey continues here. 📊",
                "Great to see you! Let's check your financial progress. 💎",
                "Welcome back! Time to make smart money decisions. 🚀"
            ],
            register: [
                "Welcome to CashCast! Let's start your financial journey! 🌟",
                "Hello! Ready to take control of your money? 💪",
                "Welcome aboard! Your path to financial freedom starts here. 🎯",
                "Great to have you! Let's build your financial future together. 🏆"
            ]
        };

        // Show AI greeting
        function showAIGreeting(type = 'login') {
            const greetings = aiGreetings[type];
            const randomGreeting = greetings[Math.floor(Math.random() * greetings.length)];
            
            setTimeout(() => {
                showAuroraToast(randomGreeting, 'info');
            }, 2000);
        }

        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus effects to inputs
            document.querySelectorAll('.aurora-auth-input').forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-2px)';
                    this.parentElement.style.transition = 'all 0.3s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Add ripple effect to buttons
            document.querySelectorAll('.aurora-auth-button').forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    ripple.style.position = 'absolute';
                    ripple.style.borderRadius = '50%';
                    ripple.style.background = 'rgba(255, 255, 255, 0.6)';
                    ripple.style.transform = 'scale(0)';
                    ripple.style.animation = 'ripple 0.6s linear';
                    ripple.style.left = (e.offsetX - 10) + 'px';
                    ripple.style.top = (e.offsetY - 10) + 'px';
                    ripple.style.width = ripple.style.height = '20px';
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => ripple.remove(), 600);
                });
            });
        });

        // Add ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Dynamic particles
        function createParticle() {
            const particle = document.createElement('div');
            particle.className = 'aurora-particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 8 + 's';
            particle.style.animationDuration = (Math.random() * 6 + 6) + 's';
            
            document.querySelector('.aurora-particles').appendChild(particle);
            
            setTimeout(() => particle.remove(), 12000);
        }

        // Create particles periodically
        setInterval(createParticle, 3000);
    </script>
</body>
</html>
