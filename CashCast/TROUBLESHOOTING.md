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
