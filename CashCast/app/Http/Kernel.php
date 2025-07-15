<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use App\Http\Middleware\CheckUserProfile;
// use Spatie\Permission\Middleware\CheckUserProfile;

class Kernel extends HttpKernel
{
    // In Laravel 11+, middleware is registered in bootstrap/app.php
}
