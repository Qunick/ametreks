<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'email_notifications',
        'sms_notifications',
        'newsletter',
        'show_profile',
        'group_type_preference',
        'preferred_group_size',
        'preferred_trek_types',
        'avoided_trek_types'
    ];

    protected $casts = [
        'preferred_trek_types' => 'array',
        'avoided_trek_types' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}