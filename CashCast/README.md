<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://laravel.com/img/logomark.min.svg" width="120" alt="Laravel Logo">
  </a>
</p>

<h1 align="center">CashCast - Financial Management Platform</h1>

<p align="center">
    <a href="https://laravel.com/docs"><strong>Explore the Laravel docs »</strong></a>
</p>


<p align="center">
  Smart budgeting web app with predictive analytics built on Laravel.
  <br>
  Track expenses, analyze trends, and plan smarter.
</p>

<p align="center">
    <a href="#"><img src="https://img.shields.io/badge/status-in%20progress-yellow" alt="Project Status"></a>
    <a href="#"><img src="https://img.shields.io/badge/build-passing-brightgreen" alt="Build Status"></a>
    <a href="#"><img src="https://img.shields.io/badge/laravel-11-red" alt="Laravel Version"></a>
    <a href="#"><img src="https://img.shields.io/badge/license-MIT-blue" alt="License"></a>
</p>

---

## 🚀 Features

- 📈 Visual spending dashboards
- 🧠 AI-lite trend predictions
- 🏷️ Auto-categorized expenses
- 🔁 Background job processing (Horizon + Redis)
- ⏱️ Automated analysis (Laravel Scheduler)

---

## ⚙️ Installation

```bash
git clone https://github.com/mohamedAskaarr/CashCast.git
cd CashCast
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


### Security & Permissions
- Role-based access control (RBAC) using Spatie Permission
- Supervisor dashboard for administrative tasks
- Secure user authentication and authorization
- Permission management system

### Aurora UI System
- Modern, animated interface with aurora-inspired design
- Interactive charts and data visualizations
- Smooth scroll animations and transitions
- Mobile-optimized responsive design
- Dark theme with glass morphism effects

## Technology Stack

### Backend
- **Laravel 11+**: Modern PHP framework with latest features
- **Spatie Permission**: Role and permission management
- **SQLite**: Lightweight, fast database for development
- **PHP 8.2+**: Latest PHP features and performance improvements

### Frontend (Aurora UI System)
- **Tailwind CSS**: Utility-first CSS framework
- **Chart.js**: Beautiful, responsive charts
- **AOS (Animate On Scroll)**: Smooth scroll animations
- **Lottie**: Advanced animation support
- **CountUp.js**: Animated number counters
- **Inter Font**: Modern typography

### Development Tools
- **Vite**: Fast build tool and development server
- **NPM/Composer**: Package management
- **Laravel Mix**: Asset compilation
- **PHPUnit**: Testing framework

## Aurora UI System

The Aurora UI System is our custom-built design framework that powers the entire CashCast interface. It features:

- Animated Backgrounds: Dynamic aurora-inspired gradients
- Particle System: Floating particles for depth and movement
- Glass Morphism: Translucent cards with backdrop blur
- Interactive Elements: Smooth hover effects and transitions
- Responsive Design: Mobile-first approach
- Accessibility: WCAG compliant design

**[View Aurora UI System Documentation](AURORA_UI_SYSTEM.md)**

## Getting Started

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js and NPM
- SQLite (or your preferred database)

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd CashCast
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run dev
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

### Default Credentials
- **Admin User**: Check database seeder for default credentials
- **Supervisor Access**: Admin users have supervisor privileges

## Features Overview

### Dashboard
- Beautiful animated hero section
- Real-time financial statistics
- Interactive charts and graphs
- Quick action buttons
- Recent transactions overview

### User Management
- Role-based access control
- Permission assignment
- User activity tracking
- Profile management

### Financial Tracking
- Expense categorization
- Budget planning
- Transaction history
- Financial reports
- Analytics dashboard

### Supervisor Panel
- User permission management
- System configuration
- Security monitoring
- Administrative controls

## Testing

### Run Tests
```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature

# Run with coverage
php artisan test --coverage
```

### Development Commands
```bash
# Watch for file changes
npm run watch

# Build for production
npm run build

# Run database migrations
php artisan migrate

# Clear application cache
php artisan cache:clear
```

## Documentation

- **[Project Wiki](WIKI.md)**: Complete troubleshooting guide with errors, bugs, and solutions
- **[Quick Troubleshooting](TROUBLESHOOTING.md)**: Fast fixes for common issues
- **[Aurora UI System Documentation](AURORA_UI_SYSTEM.md)**: Complete design system guide
- **[Laravel Documentation](https://laravel.com/docs)**: Framework documentation
- **[Spatie Permission](https://spatie.be/docs/laravel-permission)**: Permission management

## Contributing

We welcome contributions! Please follow these guidelines:

1. **Code Style**: Follow PSR-12 coding standards
2. **UI/UX**: Maintain Aurora UI System consistency
3. **Testing**: Add tests for new features
4. **Documentation**: Update documentation for changes
5. **Performance**: Optimize for speed and accessibility

## Security

Security is a top priority. Features include:

- **Authentication**: Secure user login and registration
- **Authorization**: Role-based access control
- **Input Validation**: Comprehensive form validation
- **CSRF Protection**: Built-in CSRF protection
- **XSS Prevention**: Input sanitization and output encoding

If you discover a security vulnerability, please email us immediately.

## License

This project is proprietary software. All rights reserved.

## Acknowledgments

- **Laravel Team**: For the excellent framework
- **Spatie**: For the permission package
- **Tailwind CSS**: For the utility-first CSS framework
- **Chart.js**: For beautiful data visualizations
- **AOS**: For smooth scroll animations
