<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Debug: Log the user and is_admin value
            \Log::info('Login attempt:', [
                'user_id' => $user->id,
                'email' => $user->email,
                'is_admin' => $user->is_admin ?? 'Field does not exist'
            ]);
            
            // Check if user is admin
            if ($user->is_admin) {
                // Regenerate session for security
                $request->session()->regenerate();
                
                return redirect()->route('admin.dashboard')->with('success', 'Welcome to Dashboard');
            }
            
            // If not admin, logout
            Auth::logout();
            return redirect()->back()->withErrors([
                'email' => 'You do not have admin access.',
            ])->withInput($request->only('email'));
        }

        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}