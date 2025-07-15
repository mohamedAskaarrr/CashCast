<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SuperVisorControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Create admin role and permission
        $adminRole = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'test-permission']);
        
        // Create admin user
        $this->adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);
        $this->adminUser->assignRole('admin');
        
        // Create regular user
        $this->regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => bcrypt('password')
        ]);
    }

    public function test_givePermission_requires_authentication()
    {
        $response = $this->post('/supervisors/give-permission', [
            'role_id' => 1,
            'permission' => 'test-permission'
        ]);
        
        $response->assertStatus(302); // Redirect to login
    }

    public function test_givePermission_requires_admin_role()
    {
        $response = $this->actingAs($this->regularUser)
            ->post('/supervisors/give-permission', [
                'role_id' => 1,
                'permission' => 'test-permission'
            ]);
        
        $response->assertStatus(403); // Forbidden
    }

    public function test_givePermission_validates_input()
    {
        $response = $this->actingAs($this->adminUser)
            ->post('/supervisors/give-permission', []);
        
        $response->assertSessionHasErrors(['role_id', 'permission']);
    }

    public function test_givePermission_works_with_valid_input()
    {
        $role = Role::create(['name' => 'test-role']);
        $permission = Permission::create(['name' => 'new-permission']);
        
        $response = $this->actingAs($this->adminUser)
            ->post('/supervisors/give-permission', [
                'role_id' => $role->id,
                'permission' => $permission->name
            ]);
        
        $response->assertSessionHas('success');
        $this->assertTrue($role->hasPermissionTo($permission));
    }

    public function test_givePermission_handles_invalid_role_id()
    {
        $response = $this->actingAs($this->adminUser)
            ->post('/supervisors/give-permission', [
                'role_id' => 999,
                'permission' => 'test-permission'
            ]);
        
        $response->assertSessionHasErrors(['role_id']);
    }

    public function test_givePermission_handles_invalid_permission()
    {
        $role = Role::create(['name' => 'test-role']);
        
        $response = $this->actingAs($this->adminUser)
            ->post('/supervisors/give-permission', [
                'role_id' => $role->id,
                'permission' => 'nonexistent-permission'
            ]);
        
        $response->assertSessionHasErrors(['permission']);
    }
}