# 🎨 Aurora UI System - Quick Start Guide

## 🚀 Getting Started

The Aurora UI System is already integrated into your CashCast application. Here's how to use it effectively:

### 1. Basic Page Structure

```blade
@extends('layouts.auth')

@section('title', 'Your Page Title')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="aurora-fade-in">
        <!-- Your content goes here -->
    </div>
</div>
@endsection
```

### 2. Aurora Cards

```blade
<!-- Basic Card -->
<div class="aurora-card p-6 rounded-xl">
    <h3 class="text-xl font-bold text-white mb-4">Card Title</h3>
    <p class="text-gray-300">Card content</p>
</div>

<!-- Card with Hover Effect -->
<div class="aurora-card p-6 rounded-xl aurora-hover-lift" data-aos="fade-up">
    <h3 class="text-xl font-bold text-white mb-4">Animated Card</h3>
    <p class="text-gray-300">This card will lift on hover</p>
</div>
```

### 3. Aurora Buttons

```blade
<!-- Primary Button -->
<button class="aurora-btn bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-3 rounded-lg text-white font-medium">
    Primary Action
</button>

<!-- Secondary Button -->
<button class="aurora-btn bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-3 rounded-lg text-white font-medium">
    Secondary Action
</button>

<!-- Success Button -->
<button class="aurora-btn bg-gradient-to-r from-green-600 to-emerald-600 px-6 py-3 rounded-lg text-white font-medium">
    Success Action
</button>
```

### 4. Aurora Forms

```blade
<form class="space-y-6">
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">Field Label</label>
        <input type="text" class="aurora-input w-full px-4 py-3 rounded-lg" placeholder="Enter value">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-300 mb-2">Message</label>
        <textarea class="aurora-input w-full px-4 py-3 rounded-lg h-24 resize-none" placeholder="Enter message"></textarea>
    </div>
    
    <button type="submit" class="aurora-btn bg-gradient-to-r from-purple-600 to-pink-600 px-6 py-3 rounded-lg text-white font-medium">
        Submit
    </button>
</form>
```

### 5. Aurora Animations

```blade
<!-- Fade in animation -->
<div class="aurora-fade-in" data-aos="fade-up">
    Content appears smoothly
</div>

<!-- Slide in animation -->
<div class="aurora-slide-in" data-aos="slide-left">
    Content slides in from left
</div>

<!-- Pulse animation -->
<div class="aurora-pulse">
    Content pulses rhythmically
</div>

<!-- Gradient text -->
<h1 class="aurora-gradient-text text-4xl font-bold">
    Beautiful Gradient Text
</h1>
```

### 6. Aurora JavaScript API

```javascript
// Show toast notifications
AuroraToast.show('Success message!', 'success');
AuroraToast.show('Error message!', 'error');
AuroraToast.show('Warning message!', 'warning');
AuroraToast.show('Info message!', 'info');

// Show/hide loading
AuroraLoading.show();
AuroraLoading.hide();

// Animate numbers
AuroraAnimation.countUp(element, 1000, 2000);

// Animate elements
AuroraAnimation.fadeIn(element, 500);
AuroraAnimation.slideIn(element, 'left', 500);
```

### 7. Aurora Utility Classes

```blade
<!-- Glass effects -->
<div class="aurora-glass p-6 rounded-xl">Glass effect</div>
<div class="aurora-glass-dark p-6 rounded-xl">Dark glass effect</div>

<!-- Hover effects -->
<div class="aurora-hover-scale">Scales on hover</div>
<div class="aurora-hover-lift">Lifts on hover</div>
<div class="aurora-hover-glow">Glows on hover</div>

<!-- Borders and shadows -->
<div class="aurora-border-gradient p-6 rounded-xl">Gradient border</div>
<div class="aurora-shadow-purple">Purple shadow</div>
<div class="aurora-shadow-pink">Pink shadow</div>
```

## 🎯 Common Patterns

### Hero Section
```blade
<div class="text-center mb-12" data-aos="fade-up">
    <h1 class="aurora-gradient-text text-5xl md:text-6xl font-bold mb-6">
        Page Title
    </h1>
    <p class="text-xl text-gray-300 max-w-2xl mx-auto">
        Page description
    </p>
</div>
```

### Stats Grid
```blade
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    <div class="aurora-card p-6 rounded-xl text-center" data-aos="fade-up">
        <h3 class="text-3xl font-bold text-white mb-2">$24,750</h3>
        <p class="text-gray-300">Total Revenue</p>
    </div>
    <!-- More stat cards -->
</div>
```

### Action Cards
```blade
<div class="aurora-card p-6 rounded-xl aurora-hover-lift" data-aos="fade-up">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-semibold text-white">Card Title</h3>
        <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-lg flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                <!-- Icon path -->
            </svg>
        </div>
    </div>
    <p class="text-gray-300 mb-4">Card content</p>
    <button class="aurora-btn bg-gradient-to-r from-purple-600 to-pink-600 px-4 py-2 rounded-lg text-white font-medium">
        Action
    </button>
</div>
```

## 🎨 Best Practices

1. **Use data-aos attributes** for scroll animations
2. **Apply aurora-hover-* classes** for interactive elements
3. **Use aurora-gradient-text** for important headings
4. **Implement aurora-fade-in** for page content
5. **Add aurora-card** for all content containers
6. **Use aurora-btn** for all interactive buttons
7. **Apply aurora-input** for form fields

## 🌟 Color Scheme

- **Primary**: Purple (#8b5cf6) to Pink (#ec4899)
- **Secondary**: Blue (#3b82f6) to Indigo (#6366f1)
- **Success**: Green (#10b981) to Emerald (#059669)
- **Warning**: Yellow (#f59e0b) to Orange (#ea580c)
- **Error**: Red (#ef4444) to Rose (#f43f5e)

## 📱 Responsive Design

All Aurora components are mobile-first and responsive. Use standard Tailwind responsive prefixes:
- `sm:` - Small screens (640px+)
- `md:` - Medium screens (768px+)
- `lg:` - Large screens (1024px+)
- `xl:` - Extra large screens (1280px+)

## 🎭 Performance Tips

1. Use `aurora-will-change` for frequently animated elements
2. Apply `aurora-gpu-accelerated` for smooth animations
3. Limit the number of animated elements per page
4. Use `data-aos-delay` to stagger animations
5. Consider `prefers-reduced-motion` for accessibility

## 🔧 Customization

To customize Aurora UI System colors and animations, modify the CSS variables in `layouts/auth.blade.php`:

```css
:root {
    --aurora-primary: #8b5cf6;
    --aurora-secondary: #ec4899;
    --aurora-animation-duration: 800ms;
}
```

---

**✨ Happy coding with Aurora UI System! ✨**
