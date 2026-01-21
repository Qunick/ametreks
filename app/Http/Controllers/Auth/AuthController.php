<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPreference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        // If user is already authenticated, redirect to appropriate dashboard
        if (Auth::check()) {
            return $this->redirectAuthenticatedUser();
        }
        
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        // Throttle login attempts
        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Clear login attempts
            $this->clearLoginAttempts($request);
            
            $user = Auth::user();
            
            // Update last login info
           $user->update([
    'last_login_at' => now(),
    'last_login_ip' => $request->ip(),
]);
            
            // Detect country from IP if not set
            if (!$user->country) {
                $country = $this->getCountryFromIP($request->ip());
                if ($country) {
                    $user->update(['country' => $country]);
                }
            }
            
            $request->session()->regenerate();
            
            // Check if user is admin
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome back, ' . $user->name . '!');
            }
            
            // Regular user
            return redirect()->route('user.dashboard')->with('success', 'Welcome back, ' . $user->name . '!');
        }

        // Increment login attempts
        $this->incrementLoginAttempts($request);

        // Authentication failed
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email', 'remember'));
    }

    // Google OAuth Methods
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Find or create user
            $user = User::where('google_id', $googleUser->id)
                ->orWhere('email', $googleUser->email)
                ->first();
            
            if (!$user) {
                // Get country from IP
                $country = $this->getCountryFromIP($request->ip());
                
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'avatar' => $googleUser->avatar,
                    'password' => Hash::make(Str::random(24)),
                    'email_verified_at' => now(),
                    'country' => $country,
                    'last_login_at' => now(),
                    'last_login_ip' => $request->ip(),
                ]);
                
                // Create default preferences for regular users (not admins)
                if (!$user->is_admin) {
                    UserPreference::create([
                        'user_id' => $user->id,
                        'email_notifications' => true,
                        'newsletter' => true,
                        'show_profile' => true,
                        'group_type_preference' => 'no_preference'
                    ]);
                }
            } else {
                // Update Google ID if not set
                if (!$user->google_id) {
                    $user->update(['google_id' => $googleUser->id]);
                }
                
                // Update avatar if empty
                if (!$user->avatar && $googleUser->avatar) {
                    $user->update(['avatar' => $googleUser->avatar]);
                }
                
                // Update last login
                $user->update([
                    'last_login_at' => now(),
                    'last_login_ip' => $request->ip()
                ]);
            }
            
            Auth::login($user, true);
            $request->session()->regenerate();
            
            // Redirect based on user type
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard')
                    ->with('success', 'Welcome ' . $user->name . '!');
            }
            
            return redirect()->route('user.dashboard')
                ->with('success', 'Welcome ' . $user->name . '!');
                
        } catch (\Exception $e) {
            Log::error('Google login failed: ' . $e->getMessage());
            return redirect()->route('login')
                ->with('error', 'Google login failed. Please try again.');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // You can log logout activity here if needed
        }
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    /**
     * Redirect authenticated users to their respective dashboards
     */
    protected function redirectAuthenticatedUser()
    {
        $user = Auth::user();
        
        if ($user->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->route('user.dashboard');
    }

    /**
     * Throttle login attempts
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return RateLimiter::tooManyAttempts(
            $this->throttleKey($request), 
            5 // 5 attempts
        );
    }

    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit($this->throttleKey($request), 60 * 60); // 1 hour
    }

    protected function clearLoginAttempts(Request $request)
    {
        RateLimiter::clear($this->throttleKey($request));
    }

    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input('email')) . '|' . $request->ip();
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = RateLimiter::availableIn($this->throttleKey($request));
        
        return back()->withErrors([
            'email' => 'Too many login attempts. Please try again in ' . ceil($seconds / 60) . ' minutes.',
        ])->withInput($request->only('email'));
    }

    /**
     * Get country from IP address
     */
    private function getCountryFromIP($ip)
    {
        try {
            // Using ip-api.com (free tier available)
            $response = Http::get("http://ip-api.com/json/{$ip}?fields=status,countryCode");
            
            if ($response->successful() && $response->json()['status'] === 'success') {
                return $response->json()['countryCode'] ?? null;
            }
        } catch (\Exception $e) {
            Log::error('Failed to get country from IP: ' . $e->getMessage());
        }
        
        return null;
    }
}