<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPreference;
use App\Models\TrekType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        
        // Get suggested matches
        $suggestedMatches = $user->getSuggestedMatches(6);
        
        // Get all trek types
        $trekTypes = TrekType::where('is_active', true)->get();
        
        // Get user's interests
        $userInterests = $user->formatted_interests;
        
        return view('user.dashboard', compact('user', 'suggestedMatches', 'trekTypes', 'userInterests'));
    }

    public function profile()
    {
        $user = Auth::user();
        $trekTypes = TrekType::where('is_active', true)->get();
        
        return view('user.profile', compact('user', 'trekTypes'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'gender' => 'required|in:male,female,other,prefer_not_to_say',
            'country' => 'required|string|max:2',
            'city' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
            'interests' => 'nullable|array',
            'interests.*' => 'exists:trek_types,id',
            'experience_level' => 'required|in:beginner,intermediate,advanced,expert',
            'account_type' => 'required|in:personal,group',
            'group_name' => 'nullable|required_if:account_type,group|string|max:255',
            'group_size' => 'nullable|required_if:account_type,group|integer|min:1|max:20',
            'avatar' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif'
        ]);
        
        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            if ($user->avatar && !filter_var($user->avatar, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($user->avatar);
            }
            
            $path = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $path;
        }
        
        // Update user
        $user->update($validated);
        
        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePreferences(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'email_notifications' => 'boolean',
            'sms_notifications' => 'boolean',
            'newsletter' => 'boolean',
            'show_profile' => 'boolean',
            'group_type_preference' => 'required|in:same_gender,mixed,no_preference',
            'preferred_group_size' => 'nullable|integer|min:2|max:20',
            'preferred_trek_types' => 'nullable|array',
            'avoided_trek_types' => 'nullable|array',
        ]);
        
        // Update or create preferences
        if ($user->preferences) {
            $user->preferences()->update($validated);
        } else {
            $user->preferences()->create($validated);
        }
        
        return back()->with('success', 'Preferences updated successfully!');
    }

    public function getMatches()
    {
        $user = Auth::user();
        $matches = $user->getSuggestedMatches(20);
        
        return view('user.matches', compact('user', 'matches'));
    }

    public function findSimilarInterests(Request $request)
    {
        $user = Auth::user();
        
        $query = User::where('id', '!=', $user->id)
            ->where('status', 'active')
            ->where('account_type', $user->account_type);
        
        // Filter by gender if specified
        if ($request->has('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }
        
        // Filter by experience level
        if ($request->has('experience_level')) {
            $query->where('experience_level', $request->experience_level);
        }
        
        // Filter by country
        if ($request->has('country')) {
            $query->where('country', $request->country);
        }
        
        // Filter by shared interests
        if ($user->interests) {
            $query->whereJsonContains('interests', $user->interests);
        }
        
        $matches = $query->paginate(12);
        
        return view('user.find-matches', compact('user', 'matches'));
    }
}