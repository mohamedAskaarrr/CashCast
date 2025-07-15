<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $request->validate([
            'role_id' => 'required|integer|exists:roles,id',
            'permission' => 'required|string|exists:permissions,name'
        ]);

        try {
            $role = Role::findById($request->role_id);
            $role->givePermissionTo($request->permission);
            return back()->with('success', 'Permission added successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to assign permission: ' . $e->getMessage());
        }    }  

    public function assignPermissionToExistingRole(Request $request) {
        $role = Role::findByName($request->role);
        $role->syncPermissions($request->permissions);
        return back();
    }

}
