<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'google_id',
        'avatar',
        'phone',
        'date_of_birth',
        'gender',
        'country',
        'city',
        'bio',
        'interests',
        'preferences',
        'account_type',
        'group_name',
        'group_size',
        'experience_level',
        'status',
        'last_login_at',
        'last_login_ip',
        'timezone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'google_id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'last_login_at' => 'datetime',
        'date_of_birth' => 'date',
        'interests' => 'array',
        'preferences' => 'array',
        'is_admin' => 'boolean',
    ];

    protected $appends = [
        'avatar_url',
        'age',
        'is_profile_complete'
    ];

    // Relationships
    public function preferences()
    {
        return $this->hasOne(UserPreference::class);
    }

    // Accessors
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            // Check if avatar is a URL (from Google) or a local path
            if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
                return $this->avatar;
            }
            return asset('storage/' . $this->avatar);
        }
        
        // Default avatar based on name
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . 
               '&color=FFFFFF&background=' . $this->getColorBasedOnCountry() . 
               '&bold=true&size=200';
    }

    public function getAgeAttribute()
    {
        return $this->date_of_birth?->age;
    }

    public function getIsProfileCompleteAttribute()
    {
        $requiredFields = ['name', 'email', 'country', 'gender', 'interests'];
        foreach ($requiredFields as $field) {
            if (empty($this->$field)) {
                return false;
            }
        }
        return true;
    }

    public function getFormattedInterestsAttribute()
    {
        if (!$this->interests) return [];
        
        // Assuming you have a TrekType model
        if (class_exists(TrekType::class)) {
            $trekTypes = TrekType::whereIn('id', $this->interests)->get();
            return $trekTypes->map(function($type) {
                return [
                    'id' => $type->id,
                    'name' => $type->name,
                    'color' => $type->color,
                    'icon' => $type->icon
                ];
            })->toArray();
        }
        
        return [];
    }

    // Methods
    public function updateLastLogin()
    {
        $this->update([
            'last_login_at' => now(),
            'last_login_ip' => request()->ip(),
        ]);
    }

    public function updateCountryFromIP()
    {
        $country = $this->getCountryFromIP(request()->ip());
        if ($country && !$this->country) {
            $this->update(['country' => $country]);
        }
    }

    public function getSuggestedMatches($limit = 10)
    {
        return self::where('id', '!=', $this->id)
            ->where('status', 'active')
            ->where('is_admin', false) // Only non-admin users
            ->where('account_type', $this->account_type)
            ->where(function($query) {
                if ($this->preferences && isset($this->preferences['gender_preference'])) {
                    $query->where('gender', $this->preferences['gender_preference']);
                }
            })
            ->where(function($query) {
                if ($this->interests) {
                    foreach ($this->interests as $interest) {
                        $query->orWhereJsonContains('interests', $interest);
                    }
                }
            })
            ->limit($limit)
            ->get();
    }

    // Helper methods for status changes
    public function activate()
    {
        return $this->update(['status' => 'active']);
    }

    public function deactivate()
    {
        return $this->update(['status' => 'inactive']);
    }

    public function suspend()
    {
        return $this->update(['status' => 'suspended']);
    }

    public function canBookTour()
    {
        return $this->status === 'active' && $this->email_verified_at !== null;
    }

    public function hasVerifiedEmail()
    {
        return $this->email_verified_at !== null;
    }

    public function isAdmin()
    {
        return $this->is_admin === true;
    }

    public function isRegularUser()
    {
        return $this->is_admin === false;
    }

    // Role-based colors for UI
    private function getColorBasedOnCountry()
    {
        $colors = [
            'NP' => 'C9302C', // Nepal - Red
            'US' => '005991', // USA - Blue
            'GB' => '052734', // UK - Dark Blue
            'ES' => 'FFC107', // Spain - Yellow
            'FR' => '005991', // France - Blue
            'DE' => '000000', // Germany - Black
            'IT' => '99C723', // Italy - Green
            'AU' => 'C9302C', // Australia - Red
            'CA' => 'C9302C', // Canada - Red
            'JP' => 'C9302C', // Japan - Red
        ];
        
        return $colors[$this->country] ?? '4D8BB2'; // Default blue
    }

    // Get country from IP (helper method)
    private function getCountryFromIP($ip)
    {
        try {
            // Using ip-api.com (free tier available)
            $response = \Illuminate\Support\Facades\Http::get("http://ip-api.com/json/{$ip}?fields=status,countryCode");
            
            if ($response->successful() && $response->json()['status'] === 'success') {
                return $response->json()['countryCode'] ?? null;
            }
        } catch (\Exception $e) {
            // Log error or handle silently
        }
        
        return null;
    }

    // Password reset helper
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \Illuminate\Auth\Notifications\ResetPassword($token));
    }

    // Email verification helper
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
    }

    // Scope methods for easy querying
    public function scopeAdmins($query)
    {
        return $query->where('is_admin', true);
    }

    public function scopeRegularUsers($query)
    {
        return $query->where('is_admin', false);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeWithCountry($query, $countryCode)
    {
        return $query->where('country', $countryCode);
    }

    public function scopeWithInterests($query, array $interests)
    {
        return $query->where(function($q) use ($interests) {
            foreach ($interests as $interest) {
                $q->orWhereJsonContains('interests', $interest);
            }
        });
    }
}