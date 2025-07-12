<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\CheckUserProfile;
use Spatie\Permission\Middleware\RoleMiddleware;
// use Spatie\Permission\Middleware\CheckUserProfile;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        'role' => RoleMiddleware::class,
        'permission' => PermissionMiddleware::class,
        'role_or_permission' => RoleOrPermissionMiddleware::class,
        'check.profile' => CheckUserProfile::class,
    ];
}
