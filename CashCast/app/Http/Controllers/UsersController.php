<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function doLogin(Request $request) {
        try {
            if (Auth::attempt($request->only('email', 'password'))) {
                return redirect('/dashboard');
            }
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Login failed']);
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function register() {
        return view('auth.register');
    }

    public function doRegister(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            $this->giveUserDefaults($user);
            Auth::login($user);
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Registration failed']);
        }

        return redirect('/dashboard');
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    private function giveUserDefaults(User $user) {
        $user->assignRole('user');

        $permissions = [
            'view dashboard', 'add transaction', 'edit transaction',
            'delete transaction', 'manage budget', 'view analytics', 'manage categories'
        ];

        foreach ($permissions as $perm) {
            $p = Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
            $user->givePermissionTo($p);
        }
    }
}
