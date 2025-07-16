<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;
class SuperVisorController extends Controller
{
    public function index()
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403, 'Unauthorized');
        }
    
        $roles = Role::all();
        $permissions = Permission::all();
        return view('Supervisors.superVisor', compact('roles', 'permissions'));
    }
    

    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        Role::create(['name' => $request->name]);
        return back();
    }

    public function givePermission(Request $request) {
        // Debug: Log the incoming request data
        Log::info('Give Permission Request Data:', $request->all());
        
        $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
            'permission' => 'required|string|exists:permissions,name'
        ]);

        try {
            $role = Role::findById($request->role_id);
            
            // Debug: Log the role and permission before assignment
            Log::info('Role found:', ['id' => $role->id, 'name' => $role->name]);
            Log::info('Permission to assign:', [$request->permission]);
            
            // Check if role already has this permission
            if ($role->hasPermissionTo($request->permission)) {
                return back()->with('error', 'Role already has this permission.');
            }
            
            $role->givePermissionTo($request->permission);
            
            // Debug: Verify the permission was added
            $role->refresh();
            Log::info('Role permissions after assignment:', $role->permissions->pluck('name')->toArray());
            
            return back()->with('success', 'Permission added successfully.');
        } catch (\Exception $e) {
            Log::error('Failed to assign permission:', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to assign permission: ' . $e->getMessage());
        }
    }  

    public function assignPermissionToExistingRole(Request $request) {
        $role = Role::findByName($request->role);
        $role->syncPermissions($request->permissions);
        return back();
    }

}
