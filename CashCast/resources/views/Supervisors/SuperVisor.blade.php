@extends('layouts.auth')
@section('title', 'Supervisor Panel')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-900 via-indigo-900 to-slate-900 text-white">
    
    <!-- Hero Section with Security Theme -->
    <div class="relative overflow-hidden">
        <!-- Animated Background -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-24 h-24 bg-indigo-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse"></div>
            <div class="absolute top-32 right-16 w-32 h-32 bg-cyan-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-300"></div>
            <div class="absolute bottom-20 left-32 w-28 h-28 bg-blue-500 rounded-full mix-blend-multiply filter blur-xl animate-pulse delay-500"></div>
        </div>
        
        <!-- Header -->
        <div class="relative z-10 px-6 py-8">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col lg:flex-row items-center justify-between">
                    <!-- Title Section -->
                    <div class="text-center lg:text-left mb-8 lg:mb-0">
                        <h1 class="text-4xl lg:text-6xl font-bold bg-gradient-to-r from-indigo-400 to-cyan-400 bg-clip-text text-transparent mb-4">
                            🔐 Supervisor Panel
                        </h1>
                        <p class="text-xl text-gray-300 mb-6">Manage roles and permissions with precision</p>
                        <div class="flex items-center justify-center lg:justify-start space-x-4">
                            <div class="flex items-center bg-green-600/20 border border-green-500/30 px-4 py-2 rounded-full">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Admin Access</span>
                            </div>
                            <div class="flex items-center bg-blue-600/20 border border-blue-500/30 px-4 py-2 rounded-full">
                                <svg class="w-5 h-5 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-medium">Security Enabled</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Security Illustration -->
                    <div class="flex-shrink-0">
                        <div class="relative">
                            <svg width="280" height="280" viewBox="0 0 280 280" class="animate-float">
                                <!-- Security & Permissions Illustration -->
                                <defs>
                                    <linearGradient id="securityGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#06b6d4;stop-opacity:1" />
                                    </linearGradient>
                                    <linearGradient id="shieldGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#10b981;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#059669;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                
                                <!-- Background Circle -->
                                <circle cx="140" cy="140" r="120" fill="url(#securityGradient)" opacity="0.1"/>
                                
                                <!-- Main Shield -->
                                <path d="M 140 60 Q 180 70 180 120 Q 180 180 140 220 Q 100 180 100 120 Q 100 70 140 60 Z" 
                                      fill="url(#shieldGradient)" opacity="0.9"/>
                                
                                <!-- Shield Pattern -->
                                <path d="M 140 70 Q 170 75 170 120 Q 170 170 140 200 Q 110 170 110 120 Q 110 75 140 70 Z" 
                                      fill="rgba(255,255,255,0.1)"/>
                                
                                <!-- Security Badge -->
                                <circle cx="140" cy="140" r="25" fill="rgba(255,255,255,0.9)"/>
                                <path d="M 130 140 L 137 147 L 150 134" stroke="#10b981" stroke-width="3" fill="none" stroke-linecap="round"/>
                                
                                <!-- Floating Permission Icons -->
                                <circle cx="80" cy="100" r="15" fill="url(#securityGradient)" opacity="0.8" class="animate-bounce">
                                    <animate attributeName="cy" values="100;90;100" dur="2s" repeatCount="indefinite"/>
                                </circle>
                                <text x="80" y="106" text-anchor="middle" fill="white" font-size="12" font-weight="bold">👤</text>
                                
                                <circle cx="200" cy="120" r="15" fill="url(#securityGradient)" opacity="0.8" class="animate-bounce">
                                    <animate attributeName="cy" values="120;110;120" dur="2.5s" repeatCount="indefinite"/>
                                </circle>
                                <text x="200" y="126" text-anchor="middle" fill="white" font-size="12" font-weight="bold">🔑</text>
                                
                                <circle cx="60" cy="180" r="15" fill="url(#securityGradient)" opacity="0.8" class="animate-bounce">
                                    <animate attributeName="cy" values="180;170;180" dur="3s" repeatCount="indefinite"/>
                                </circle>
                                <text x="60" y="186" text-anchor="middle" fill="white" font-size="12" font-weight="bold">⚡</text>
                                
                                <circle cx="220" cy="200" r="15" fill="url(#securityGradient)" opacity="0.8" class="animate-bounce">
                                    <animate attributeName="cy" values="200;190;200" dur="2.8s" repeatCount="indefinite"/>
                                </circle>
                                <text x="220" y="206" text-anchor="middle" fill="white" font-size="12" font-weight="bold">🛡️</text>
                                
                                <!-- Connection Lines -->
                                <path d="M 95 115 Q 120 130 140 140" stroke="#3b82f6" stroke-width="2" fill="none" opacity="0.5"/>
                                <path d="M 185 135 Q 165 140 140 140" stroke="#3b82f6" stroke-width="2" fill="none" opacity="0.5"/>
                                <path d="M 75 165 Q 110 150 140 140" stroke="#3b82f6" stroke-width="2" fill="none" opacity="0.5"/>
                                <path d="M 205 185 Q 175 160 140 140" stroke="#3b82f6" stroke-width="2" fill="none" opacity="0.5"/>
                                
                                <!-- Decorative Elements -->
                                <circle cx="40" cy="60" r="3" fill="#06b6d4" opacity="0.7"/>
                                <circle cx="240" cy="80" r="3" fill="#06b6d4" opacity="0.7"/>
                                <circle cx="260" cy="160" r="3" fill="#06b6d4" opacity="0.7"/>
                                <circle cx="20" cy="240" r="3" fill="#06b6d4" opacity="0.7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    <div class="px-6 max-w-6xl mx-auto mb-8">
        @if (session('success'))
            <div class="bg-green-500/20 border border-green-500/30 backdrop-blur-sm rounded-2xl p-4 mb-4">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-green-200 font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500/20 border border-red-500/30 backdrop-blur-sm rounded-2xl p-4 mb-4">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-red-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-red-200 font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-500/20 border border-red-500/30 backdrop-blur-sm rounded-2xl p-4 mb-4">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-red-400 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <ul class="text-red-200 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <div class="px-6 max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Permission Assignment Form -->
            <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-8 hover:border-white/20 transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="p-3 bg-gradient-to-r from-indigo-600 to-cyan-600 rounded-xl mr-4">
                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">Assign Permissions</h3>
                        <p class="text-gray-400">Grant specific permissions to roles</p>
                    </div>
                </div>
                
                <form method="POST" action="{{ route('supervisors.give-permission') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Role Selection -->
                    <div>
                        <label for="role_id" class="block text-sm font-medium text-white mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                            Select Role
                        </label>
                        <div class="relative">
                            <select name="role_id" id="role_id" required 
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 pl-12 text-white focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
                                <option value="" class="bg-slate-800">-- Select a Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" class="bg-slate-800">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Permission Selection -->
                    <div>
                        <label for="permission" class="block text-sm font-medium text-white mb-2">
                            <svg class="w-4 h-4 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Select Permission
                        </label>
                        <div class="relative">
                            <select name="permission" id="permission" required 
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-3 pl-12 text-white focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-all duration-300">
                                <option value="" class="bg-slate-800">-- Select a Permission --</option>
                                @foreach($permissions as $permission)
                                    <option value="{{ $permission->name }}" class="bg-slate-800">{{ $permission->name }}</option>
                                @endforeach
                            </select>
                            <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-indigo-600 to-cyan-600 hover:from-indigo-700 hover:to-cyan-700 text-white font-bold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
                            <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Grant Permission
                        </button>
                    </div>
                </form>
            </div>

            <!-- System Overview -->
            <div class="space-y-6">
                
                <!-- Roles Overview -->
                <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:border-white/20 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="p-2 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">System Roles</h3>
                    </div>
                    <div class="space-y-2">
                        @foreach($roles as $role)
                            <div class="flex items-center justify-between p-3 bg-white/5 rounded-lg border border-white/10">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                                    <span class="text-white font-medium">{{ $role->name }}</span>
                                </div>
                                <span class="text-sm text-gray-400">{{ $role->permissions->count() }} permissions</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Permissions Overview -->
                <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl p-6 hover:border-white/20 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="p-2 bg-gradient-to-r from-green-600 to-emerald-600 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white">Available Permissions</h3>
                    </div>
                    <div class="grid grid-cols-1 gap-2 max-h-64 overflow-y-auto custom-scrollbar">
                        @foreach($permissions as $permission)
                            <div class="flex items-center p-2 bg-white/5 rounded-lg border border-white/10">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                <span class="text-white text-sm">{{ $permission->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gradient-to-r from-blue-600/20 to-indigo-600/20 backdrop-blur-sm border border-blue-500/30 rounded-xl p-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white mb-1">{{ count($roles) }}</div>
                            <div class="text-blue-200 text-sm">Total Roles</div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-green-600/20 to-emerald-600/20 backdrop-blur-sm border border-green-500/30 rounded-xl p-4">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white mb-1">{{ count($permissions) }}</div>
                            <div class="text-green-200 text-sm">Total Permissions</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Attribution -->
    <div class="px-6 py-8 max-w-6xl mx-auto">
        <div class="text-center text-xs text-gray-500 border-t border-gray-700 pt-6">
            <div class="flex justify-center items-center space-x-2">
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
                <span>Secured by CashCast Permission System</span>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
    }
    
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
    
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(59, 130, 246, 0.5);
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: rgba(59, 130, 246, 0.7);
    }
    
    /* Enhanced form styles */
    select option {
        background: #1e293b;
        color: white;
    }
    
    /* Glow effect on focus */
    .focus\:ring-2:focus {
        box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2), 0 0 20px rgba(59, 130, 246, 0.1);
    }
</style>
@endpush
