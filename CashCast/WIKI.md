# CashCast Wiki - Errors, Bugs & Solutions

## Table of Contents

1. [Common Installation Issues](#common-installation-issues)
2. [Laravel 11+ Specific Issues](#laravel-11-specific-issues)
3. [Spatie Permission Issues](#spatie-permission-issues)
4. [Aurora UI System Issues](#aurora-ui-system-issues)
5. [Database Issues](#database-issues)
6. [Frontend/Asset Issues](#frontenddasset-issues)
7. [Performance Issues](#performance-issues)
8. [Security Issues](#security-issues)
9. [Development Environment Issues](#development-environment-issues)
10. [Troubleshooting Checklist](#troubleshooting-checklist)

---

## Common Installation Issues

### 1. Composer Dependencies Issues

**Problem**: `composer install` fails with dependency conflicts
```bash
Your requirements could not be resolved to an installable set of packages.
```

**Solution**:
```bash
# Clear composer cache
composer clear-cache

# Update composer to latest version
composer self-update

# Install with specific PHP version
composer install --ignore-platform-reqs

# Alternative: Force update
composer update --ignore-platform-reqs
```

### 2. NPM/Node.js Issues

**Problem**: `npm install` fails or package vulnerabilities
```bash
npm ERR! peer dep missing
```

**Solution**:
```bash
# Clear npm cache
npm cache clean --force

# Delete node_modules and package-lock.json
rm -rf node_modules package-lock.json

# Reinstall
npm install

# Fix vulnerabilities
npm audit fix
```

### 3. PHP Version Compatibility

**Problem**: PHP version too old for Laravel 11+
```bash
PHP Fatal error: This package requires PHP >= 8.2.0
```

**Solution**:
- Update PHP to 8.2 or higher
- Check PHP version: `php -v`
- Update composer.json if needed:
```json
{
    "require": {
        "php": "^8.2"
    }
}
```

---

## Laravel 11+ Specific Issues

### 1. Middleware Registration Changes

**Problem**: Middleware not working after Laravel 11+ upgrade
```bash
Class 'role' not found or middleware not registered
```

**Solution**: 
Laravel 11+ changed middleware registration from `app/Http/Kernel.php` to `bootstrap/app.php`

**Fixed in**: `bootstrap/app.php`
```php
<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
```

### 2. Service Provider Issues

**Problem**: Service providers not loading properly
```bash
Class 'App\Providers\AppServiceProvider' not found
```

**Solution**: Check `bootstrap/providers.php`
```php
<?php
return [
    App\Providers\AppServiceProvider::class,
];
```

### 3. Configuration Cache Issues

**Problem**: Configuration changes not reflected
```bash
Configuration cache may be corrupt
```

**Solution**:
```bash
# Clear all Laravel caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Rebuild optimized class loader
composer dump-autoload
```

---

## Spatie Permission Issues

### 1. Permission Tables Not Created

**Problem**: `spatie_permission` tables don't exist
```bash
SQLSTATE[42S02]: Base table or view not found: 1146 Table 'permissions' doesn't exist
```

**Solution**:
```bash
# Publish migrations
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

# Run migrations
php artisan migrate

# If tables exist but are empty, seed them
php artisan db:seed
```

### 2. HasRoles Trait Issues

**Problem**: `HasRoles` trait not working properly
```bash
Call to undefined method hasRole()
```

**Solution**: Ensure User model has the trait
```php
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    
    // ... rest of model
}
```

### 3. Role/Permission Middleware Not Working

**Problem**: Middleware protection not working
```bash
Route not protected by role/permission middleware
```

**Solution**: 
1. Ensure middleware is registered (see Laravel 11+ section)
2. Check route definition:
```php
Route::middleware(['auth', 'role:supervisor'])->group(function () {
    Route::get('/supervisor', [SuperVisorController::class, 'index']);
});
```

---

## Aurora UI System Issues

### 1. CSS Not Loading

**Problem**: Aurora UI styles not applied
```bash
Styles not loading or appearing broken
```

**Solution**:
```bash
# Rebuild assets
npm run dev

# For production
npm run build

# Check if Tailwind is working
npm run watch
```

### 2. JavaScript Animation Issues

**Problem**: Animations not working or console errors
```bash
Uncaught TypeError: Cannot read properties of undefined
```

**Solution**:
1. Check if AOS is properly imported:
```javascript
import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS
AOS.init({
    duration: 1000,
    easing: 'ease-in-out',
    once: true
});
```

2. Verify CountUp.js integration:
```javascript
import { CountUp } from 'countup.js';

// Initialize counters
const counters = document.querySelectorAll('.counter');
counters.forEach(counter => {
    const countUp = new CountUp(counter, counter.dataset.target);
    countUp.start();
});
```

### 3. Responsive Design Issues

**Problem**: Layout breaks on mobile devices
```bash
Mobile layout not responsive
```

**Solution**: Check Tailwind responsive classes
```html
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Content -->
    </div>
</div>
```

---

## Database Issues

### 1. SQLite Database Not Found

**Problem**: Database file doesn't exist
```bash
SQLSTATE[HY000] [14] unable to open database file
```

**Solution**:
```bash
# Create database file
touch database/database.sqlite

# Run migrations
php artisan migrate

# Seed database
php artisan db:seed
```

### 2. Migration Issues

**Problem**: Migrations fail or rollback needed
```bash
Migration table not found or migration failed
```

**Solution**:
```bash
# Check migration status
php artisan migrate:status

# Rollback specific migration
php artisan migrate:rollback --step=1

# Fresh migration (WARNING: destroys data)
php artisan migrate:fresh --seed
```

### 3. Seeder Issues

**Problem**: Database seeders not working
```bash
Class 'DatabaseSeeder' not found
```

**Solution**:
```bash
# Regenerate autoload files
composer dump-autoload

# Run specific seeder
php artisan db:seed --class=DatabaseSeeder

# Create new seeder
php artisan make:seeder UserSeeder
```

---

## Frontend/Asset Issues

### 1. Vite Build Errors

**Problem**: Vite build fails or assets not loading
```bash
Build failed with errors
```

**Solution**:
```bash
# Clear Vite cache
rm -rf node_modules/.vite

# Reinstall dependencies
npm install

# Build assets
npm run build

# Development server
npm run dev
```

### 2. Chart.js Issues

**Problem**: Charts not rendering
```bash
Cannot read properties of null (reading 'getContext')
```

**Solution**:
```javascript
// Ensure DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('myChart');
    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                // chart data
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    }
});
```

### 3. Font Loading Issues

**Problem**: Inter font not loading
```bash
Font not displayed correctly
```

**Solution**: Check font imports in CSS
```css
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
}
```

---

## Performance Issues

### 1. Slow Page Load

**Problem**: Pages loading slowly
```bash
Application performance degraded
```

**Solution**:
```bash
# Optimize Laravel
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimize assets
npm run build
```

### 2. Memory Issues

**Problem**: PHP memory limit exceeded
```bash
Fatal error: Allowed memory size exhausted
```

**Solution**:
1. Increase PHP memory limit in `php.ini`:
```ini
memory_limit = 256M
```

2. Or temporarily in code:
```php
ini_set('memory_limit', '256M');
```

### 3. Database Query Performance

**Problem**: Slow database queries
```bash
Queries taking too long to execute
```

**Solution**:
```bash
# Enable query logging
php artisan tinker
DB::enableQueryLog();

# Analyze slow queries
php artisan telescope:install  # If using Telescope

# Add database indexes
php artisan make:migration add_indexes_to_transactions_table
```

---

## Security Issues

### 1. CSRF Token Issues

**Problem**: CSRF token mismatch
```bash
TokenMismatchException in VerifyCsrfToken.php
```

**Solution**:
1. Check if CSRF token is included in forms:
```blade
<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- form fields -->
</form>
```

2. For AJAX requests:
```javascript
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
```

### 2. Permission Denied Errors

**Problem**: User cannot access protected routes
```bash
403 Forbidden - Access denied
```

**Solution**:
```bash
# Check user permissions
php artisan tinker
$user = User::find(1);
$user->permissions;
$user->roles;

# Assign permissions
$user->assignRole('supervisor');
$user->givePermissionTo('manage-users');
```

### 3. Session Issues

**Problem**: User sessions not persisting
```bash
Session data not maintained
```

**Solution**:
1. Check session configuration in `.env`:
```env
SESSION_DRIVER=file
SESSION_LIFETIME=120
```

2. Clear sessions:
```bash
php artisan session:table
php artisan migrate
```

---

## Development Environment Issues

### 1. Artisan Commands Not Working

**Problem**: `php artisan` commands fail
```bash
Command not found or throws errors
```

**Solution**:
```bash
# Check if in correct directory
pwd

# Check PHP version
php -v

# Regenerate autoload
composer dump-autoload

# Clear all caches
php artisan optimize:clear
```

### 2. Environment Variables Issues

**Problem**: `.env` variables not loaded
```bash
Environment variables not accessible
```

**Solution**:
```bash
# Check .env file exists
ls -la .env

# Copy from example
cp .env.example .env

# Generate app key
php artisan key:generate

# Clear config cache
php artisan config:clear
```

### 3. File Permission Issues

**Problem**: Permission denied errors
```bash
Permission denied writing to storage
```

**Solution**:
```bash
# Fix storage permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Set proper ownership (Linux/Mac)
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

---

## Troubleshooting Checklist

### When Something Breaks:

1. **Check Error Logs**
   ```bash
   tail -f storage/logs/laravel.log
   ```

2. **Clear All Caches**
   ```bash
   php artisan optimize:clear
   ```

3. **Check Environment**
   ```bash
   php artisan about
   ```

4. **Verify Dependencies**
   ```bash
   composer install
   npm install
   ```

5. **Check Database Connection**
   ```bash
   php artisan tinker
   DB::connection()->getPdo();
   ```

6. **Test Basic Routes**
   ```bash
   php artisan route:list
   ```

7. **Check File Permissions**
   ```bash
   ls -la storage/
   ls -la bootstrap/cache/
   ```

### Emergency Reset Commands:

```bash
# Nuclear option - reset everything
php artisan optimize:clear
composer dump-autoload
php artisan migrate:fresh --seed
npm run build
php artisan serve
```

### Development vs Production Issues:

**Development:**
- Use `npm run dev` for hot reloading
- Enable debug mode: `APP_DEBUG=true`
- Use detailed error pages

**Production:**
- Use `npm run build` for optimized assets
- Disable debug: `APP_DEBUG=false`
- Enable caching: `php artisan optimize`

---

## Getting Help

### Internal Resources:
- [Aurora UI System Documentation](AURORA_UI_SYSTEM.md)
- [Aurora Quick Start Guide](AURORA_QUICK_START.md)
- Project README.md

### External Resources:
- [Laravel Documentation](https://laravel.com/docs)
- [Spatie Permission Documentation](https://spatie.be/docs/laravel-permission)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [Chart.js Documentation](https://www.chartjs.org/docs/)

### Community Support:
- Laravel Discord
- Stack Overflow
- GitHub Issues

---

## Contributing to This Wiki

Found a bug or solution not listed here? Please:

1. Document the issue clearly
2. Provide step-by-step reproduction
3. Include the solution that worked
4. Add relevant error messages
5. Update this wiki file

**Last Updated**: July 16, 2025  
**Version**: 1.0  
**Maintainer**: CashCast Development Team
