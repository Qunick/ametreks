<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'message',
        'data',
        'read_at',
        'action_url',
    ];

    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function scopeRead($query)
    {
        return $query->whereNotNull('read_at');
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Methods
    public function markAsRead()
    {
        if (!$this->read_at) {
            $this->read_at = now();
            $this->save();
        }
    }

    public function markAsUnread()
    {
        $this->read_at = null;
        $this->save();
    }

    public function isRead()
    {
        return !is_null($this->read_at);
    }

    public function isUnread()
    {
        return is_null($this->read_at);
    }

    public function getIconAttribute()
    {
        return match($this->type) {
            'booking' => 'fas fa-calendar-check',
            'payment' => 'fas fa-credit-card',
            'review' => 'fas fa-star',
            'system' => 'fas fa-cog',
            'promotion' => 'fas fa-bullhorn',
            default => 'fas fa-bell',
        };
    }

    public function getIconColorAttribute()
    {
        return match($this->type) {
            'booking' => 'text-blue-500',
            'payment' => 'text-green-500',
            'review' => 'text-yellow-500',
            'system' => 'text-purple-500',
            'promotion' => 'text-pink-500',
            default => 'text-gray-500',
        };
    }

    // Static Methods
    public static function createForUser($userId, $type, $title, $message, $data = [], $actionUrl = null)
    {
        return self::create([
            'user_id' => $userId,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'data' => $data,
            'action_url' => $actionUrl,
        ]);
    }

    public static function createForAdmins($type, $title, $message, $data = [], $actionUrl = null)
    {
        $adminIds = User::where('role', 'admin')->pluck('id');
        
        $notifications = [];
        foreach ($adminIds as $adminId) {
            $notifications[] = [
                'user_id' => $adminId,
                'type' => $type,
                'title' => $title,
                'message' => $message,
                'data' => $data,
                'action_url' => $actionUrl,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        self::insert($notifications);
    }
}