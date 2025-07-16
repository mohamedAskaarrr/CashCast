<!-- 
🌟 Aurora UI System Example Component
This file demonstrates how to use the Aurora UI System in CashCast
-->

@extends('layouts.auth')

@section('title', 'Aurora UI System Demo')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- 🎨 Aurora Hero Section -->
    <div class="text-center mb-12" data-aos="fade-up">
        <h1 class="aurora-gradient-text text-5xl md:text-6xl font-bold mb-6">
            Aurora UI System
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">
            Experience the future of modern UI/UX design with our comprehensive component library
        </p>
    </div>

    <!-- 🚀 Aurora Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <!-- Card 1: Animated Stats -->
        <div class="aurora-card p-6 rounded-xl aurora-hover-lift" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-white">Total Revenue</h3>
                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center aurora-pulse">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-3xl font-bold text-white mb-2" id="revenue-counter">0</p>
            <p class="text-sm text-green-400">+12% from last month</p>
        </div>

        <!-- Card 2: Interactive Chart -->
        <div class="aurora-card p-6 rounded-xl aurora-hover-lift" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-lg font-semibold text-white mb-4">Monthly Trends</h3>
            <div class="h-32">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        <!-- Card 3: Action Buttons -->
        <div class="aurora-card p-6 rounded-xl aurora-hover-lift" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-lg font-semibold text-white mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <button class="aurora-btn w-full bg-gradient-to-r from-purple-600 to-pink-600 px-4 py-2 rounded-lg text-white font-medium"
                        onclick="AuroraToast.show('Success notification!', 'success')">
                    Show Success Toast
                </button>
                <button class="aurora-btn w-full bg-gradient-to-r from-red-600 to-orange-600 px-4 py-2 rounded-lg text-white font-medium"
                        onclick="AuroraToast.show('Error notification!', 'error')">
                    Show Error Toast
                </button>
                <button class="aurora-btn w-full bg-gradient-to-r from-blue-600 to-indigo-600 px-4 py-2 rounded-lg text-white font-medium"
                        onclick="AuroraToast.show('Info notification!', 'info')">
                    Show Info Toast
                </button>
            </div>
        </div>
    </div>

    <!-- 🎭 Aurora Form Example -->
    <div class="aurora-card p-8 rounded-xl mb-12" data-aos="fade-up" data-aos-delay="400">
        <h3 class="text-2xl font-bold text-white mb-6 aurora-gradient-text">
            Beautiful Form Components
        </h3>
        <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Full Name</label>
                    <input type="text" class="aurora-input w-full px-4 py-3 rounded-lg" placeholder="Enter your full name">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Email Address</label>
                    <input type="email" class="aurora-input w-full px-4 py-3 rounded-lg" placeholder="Enter your email">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Message</label>
                <textarea class="aurora-input w-full px-4 py-3 rounded-lg h-24 resize-none" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="aurora-btn bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-3 rounded-lg text-white font-medium">
                Send Message
            </button>
        </form>
    </div>

    <!-- 🌟 Aurora Loading Demo -->
    <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="500">
        <h3 class="text-2xl font-bold text-white mb-6">Loading System</h3>
        <button class="aurora-btn bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-3 rounded-lg text-white font-medium"
                onclick="showLoadingDemo()">
            Show Loading Demo
        </button>
    </div>

    <!-- 🎨 Aurora Utility Classes -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="aurora-glass p-6 rounded-xl text-center aurora-hover-scale" data-aos="fade-up" data-aos-delay="100">
            <h4 class="text-lg font-semibold text-white mb-2">Glass Effect</h4>
            <p class="text-sm text-gray-300">Beautiful transparency</p>
        </div>
        <div class="aurora-glass-dark p-6 rounded-xl text-center aurora-hover-scale" data-aos="fade-up" data-aos-delay="200">
            <h4 class="text-lg font-semibold text-white mb-2">Dark Glass</h4>
            <p class="text-sm text-gray-300">Elegant dark variant</p>
        </div>
        <div class="aurora-border-gradient p-6 rounded-xl text-center aurora-hover-scale" data-aos="fade-up" data-aos-delay="300">
            <h4 class="text-lg font-semibold text-white mb-2">Gradient Border</h4>
            <p class="text-sm text-gray-300">Colorful boundaries</p>
        </div>
        <div class="aurora-card p-6 rounded-xl text-center aurora-hover-glow" data-aos="fade-up" data-aos-delay="400">
            <h4 class="text-lg font-semibold text-white mb-2">Glow Effect</h4>
            <p class="text-sm text-gray-300">Magical hover glow</p>
        </div>
    </div>

    <!-- 🎯 Aurora Animation Examples -->
    <div class="aurora-card p-8 rounded-xl" data-aos="fade-up" data-aos-delay="500">
        <h3 class="text-2xl font-bold text-white mb-6 aurora-gradient-text">
            Animation Examples
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="aurora-slide-in bg-gradient-to-r from-blue-600 to-purple-600 w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                    </svg>
                </div>
                <h4 class="text-lg font-semibold text-white">Slide In</h4>
                <p class="text-sm text-gray-300">Smooth entrance animation</p>
            </div>
            <div class="text-center">
                <div class="aurora-pulse bg-gradient-to-r from-green-600 to-emerald-600 w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h4 class="text-lg font-semibold text-white">Pulse</h4>
                <p class="text-sm text-gray-300">Rhythmic pulsing effect</p>
            </div>
            <div class="text-center">
                <div class="aurora-fade-in bg-gradient-to-r from-pink-600 to-rose-600 w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
                <h4 class="text-lg font-semibold text-white">Fade In</h4>
                <p class="text-sm text-gray-300">Gentle fade appearance</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // 📊 Initialize Chart
    const ctx = document.getElementById('trendChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Revenue',
                data: [12, 19, 3, 5, 2, 3],
                borderColor: 'rgba(139, 92, 246, 1)',
                backgroundColor: 'rgba(139, 92, 246, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    display: false
                },
                x: {
                    display: false
                }
            }
        }
    });

    // 🔢 Animated Counter
    AuroraAnimation.countUp(document.getElementById('revenue-counter'), 24750, 2000);

    // 🌟 Custom animations
    setTimeout(() => {
        document.querySelectorAll('.aurora-slide-in').forEach(element => {
            AuroraAnimation.slideIn(element, 'left', 800);
        });
    }, 500);
});

// 🔥 Loading Demo Function
function showLoadingDemo() {
    AuroraLoading.show();
    setTimeout(() => {
        AuroraLoading.hide();
        AuroraToast.show('Loading complete!', 'success');
    }, 2000);
}

// 🎭 Listen for Aurora ready event
window.addEventListener('aurora:ready', function(event) {
    console.log('Aurora UI System is ready!', event.detail);
    AuroraToast.show('Aurora UI System loaded successfully!', 'success');
});
</script>
@endpush
