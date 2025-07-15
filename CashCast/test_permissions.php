<?php

require_once 'vendor/autoload.php';

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// Initialize Laravel
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Testing Spatie Permission Setup...\n";

// Check if roles exist
$roles = Role::all();
echo "Roles in database: " . $roles->count() . "\n";
foreach ($roles as $role) {
    echo "- " . $role->name . "\n";
}

// Check if permissions exist  
$permissions = Permission::all();
echo "Permissions in database: " . $permissions->count() . "\n";
foreach ($permissions as $permission) {
    echo "- " . $permission->name . "\n";
}

// Check user with ID 3 (from the error)
$user = User::find(3);
if ($user) {
    echo "User ID 3: " . $user->name . " (" . $user->email . ")\n";
    echo "User roles: " . $user->roles->pluck('name')->join(', ') . "\n";
    echo "Has admin role: " . ($user->hasRole('admin') ? 'Yes' : 'No') . "\n";
} else {
    echo "User ID 3 not found\n";
}

echo "Done!\n";
