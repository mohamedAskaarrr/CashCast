<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Show login form (MVP)
     */
    public function login() {
        return view('auth.login-improved');
    }

    /**
     * Handle login request (MVP)
     */
    public function doLogin(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Welcome back!');
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Show the registration form (MVP)
     */
    public function register() {
        return view('auth.register-improved');
    }

    /**
     * Handle registration request (MVP)
     */
    public function doRegister(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'terms' => 'required|accepted',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $this->giveUserDefaults($user);
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Account created successfully! Welcome to CashCast.');
    }

    /**
     * Handle logout request (MVP)
     */
    public function logout(Request $request) {
        // Get the user for any cleanup if needed
        $user = Auth::user();
        
        // Perform logout
        Auth::logout();
        
        // Invalidate the session
        $request->session()->invalidate();
        
        // Regenerate the CSRF token
        $request->session()->regenerateToken();
        
        // Clear any remaining session data
        $request->session()->flush();
        
        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Give default permissions to new users
     */
    private function giveUserDefaults(User $user) {
        // Assign default role
        $user->assignRole('user');

        // Default permissions for regular users
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
