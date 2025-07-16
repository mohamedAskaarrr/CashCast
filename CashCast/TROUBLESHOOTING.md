# CashCast Bug Tracker & Solutions

## Quick Links

- **[Main Wiki](WIKI.md)** - Complete troubleshooting guide
- **[Installation Issues](WIKI.md#common-installation-issues)** - Setup problems
- **[Laravel 11+ Issues](WIKI.md#laravel-11-specific-issues)** - Framework-specific problems
- **[Aurora UI Issues](WIKI.md#aurora-ui-system-issues)** - Frontend design problems
- **[Database Issues](WIKI.md#database-issues)** - DB connection and migration problems

## Quick Fixes

### Most Common Issues:

1. **Middleware Not Working**
   ```bash
   # Check bootstrap/app.php for middleware registration
   php artisan route:list
   ```

2. **Assets Not Loading**
   ```bash
   npm run dev
   # or for production
   npm run build
   ```

3. **Database Connection Issues**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```

4. **Permission Denied**
   ```bash
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   ```

5. **Clear All Caches**
   ```bash
   php artisan optimize:clear
   ```

## Emergency Reset

```bash
# Nuclear option - reset everything
php artisan optimize:clear
composer dump-autoload
php artisan migrate:fresh --seed
npm run build
php artisan serve
```

## Report New Issues

Found a bug not in our wiki? Please document:
1. Error message
2. Steps to reproduce
3. Your environment (OS, PHP version, etc.)
4. Solution if you found one

Then update the [WIKI.md](WIKI.md) file.

## Authentication Issues

### 1. Logout Not Working Properly

**Problem**: User stays logged in after clicking logout button
**Symptoms**:
- User remains authenticated after logout
- Session data persists
- CSRF token not regenerated

**Solution**:
```php
// Enhanced logout method in UsersController.php
public function logout(Request $request) {
    $user = Auth::user();
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    $request->session()->flush();
    return redirect()->route('login')->with('success', 'You have been logged out successfully.');
}
```

**Key Points**:
- Always invalidate session
- Regenerate CSRF token
- Flush session data
- Use proper redirect with route name

### 2. Password Visibility Toggle Not Working

**Problem**: Password toggle buttons don't work in register form
**Symptoms**:
- Eye icon doesn't change
- Password field doesn't toggle

**Solution**:
```javascript
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '-eye');
    
    if (field.type === 'password') {
        field.type = 'text';
        // Update to eye-slash icon
    } else {
        field.type = 'password';
        // Update to eye icon
    }
}
```

### 3. Dark Mode Not Working in Auth Pages

**Problem**: Auth pages don't respect dark mode setting
**Symptoms**:
- Theme toggle doesn't work
- Colors don't change
- Text remains unreadable

**Solution**:
- Ensure `dark:` classes are used throughout
- Include theme toggle component
- Use proper color schemes for both modes
- Test with `localStorage.getItem('theme')`

### 4. Form Validation Errors Not Displaying

**Problem**: Laravel validation errors not showing
**Symptoms**:
- Form submits without showing errors
- Error messages not styled properly

**Solution**:
```php
// Ensure proper error display in blade
@error('field_name')
    <p class="text-red-500 text-sm mt-1 flex items-center">
        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="..."></path>
        </svg>
        {{ $message }}
    </p>
@enderror
```

### 5. CSRF Token Mismatch

**Problem**: Form submission fails with CSRF token mismatch
**Symptoms**:
- 419 error on form submission
- "Page expired" message

**Solution**:
```php
// Ensure @csrf is in all forms
<form method="POST" action="{{ route('login') }}">
    @csrf
    <!-- form fields -->
</form>
```

**Prevention**:
- Always include `@csrf` in POST forms
- Regenerate token on logout
- Check session configuration

### 6. CSS Debug Output on Page

**Problem**: CSS code appearing as text on the page instead of being processed
**Symptoms**:
- Black CSS code text visible in the background
- Style rules like "background: white; border-radius: 8px;" showing on page
- Layout appearing broken or unstyled

**Solution**:
```php
// Wrong - CSS outside of style tags
</div>
    background: white;
    border-radius: 8px;
    ...

// Correct - CSS properly wrapped
</div>
<style>
    .card {
        background: white;
        border-radius: 8px;
        ...
    }
</style>
```

**Root Cause**: Missing `<style>` tags around CSS code
**Files to Check**:
- `resources/views/layouts/auth-mvp.blade.php`
- `resources/views/layouts/mvp.blade.php`

**Prevention**: Always wrap CSS code in proper `<style>` tags
