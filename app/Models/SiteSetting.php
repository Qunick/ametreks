<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'is_greetingCard_enabled',
        'is_trek_enabled',
        'is_section_enabled',
        'is_departure_enabled',
        'is_booking_enabled',
        'is_reviews_enabled',
        'is_blog_enabled',
        'is_maintenance_mode',
    ];

    protected $casts = [
        'is_greetingCard_enabled' => 'boolean',
        'is_trek_enabled' => 'boolean',
        'is_section_enabled' => 'boolean',
        'is_departure_enabled' => 'boolean',
        'is_booking_enabled' => 'boolean',
        'is_reviews_enabled' => 'boolean',
        'is_blog_enabled' => 'boolean',
        'is_maintenance_mode' => 'boolean',
    ];

     public static function getSettings()
    {
        return self::firstOrCreate(
            ['id' => 1],
            [
                'is_greetingCard_enabled' => true,
                'is_trek_enabled' => true,
                'is_section_enabled' => true,
                'is_departure_enabled' => true,
                'is_booking_enabled' => true,
                'is_reviews_enabled' => true,
                'is_blog_enabled' => true,
                'is_maintenance_mode' => false,
            ]
        );
    }
}
