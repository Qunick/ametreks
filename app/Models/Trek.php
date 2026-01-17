<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Trek extends Model
{
    protected $fillable = [
        'is_active','is_featured','is_bookable','noindex',
        'trip_type',
        'slug','meta_title','meta_keywords','meta_description',
        'title','short_desc','overview',
        'duration_days','difficulty','max_altitude','best_season','region',
        'base_price','currency',
        'main_image','image_alt','video_url'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($trek) {
            if (!$trek->slug) {
                $trek->slug = Str::slug($trek->title);
            }
        });
    }

    public static function cleanText(string $text): string
    {
        $text = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $text);
        $text = preg_replace('/ style=("|\')(.*?)("|\')/', '', $text);
        return trim($text);
    }

    public function itineraries()
    {
        return $this->hasMany(TrekItinerary::class);
    }

    public function departures()
    {
        return $this->hasMany(TrekDeparture::class);
    }

    public function galleries()
    {
        return $this->hasMany(TrekGallery::class);
    }
     public function tags()
    {
        return $this->belongsToMany(Tag::class, 'trek_tags');
    }

     public function inclusions()
    {
        return $this->hasMany(TrekInclusion::class);
    }
 public function exclusions()
    {
        return $this->hasMany(TrekExclusion::class);
    }
     public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function faqs()
{
    return $this->hasMany(Faq::class)->orderBy('order');
}

}
