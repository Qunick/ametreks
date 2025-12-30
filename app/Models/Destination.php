<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'country',
        'city',
        'latitude',
        'longitude',
        'featured_image',
        'gallery',
        'is_featured',
        'is_active',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    // Relationships
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Tour::class);
    }

    public function reviews()
    {
        return $this->hasManyThrough(Review::class, Tour::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePopular($query, $limit = 5)
    {
        return $query->withCount(['bookings' => function ($query) {
            $query->where('created_at', '>=', now()->subDays(30));
        }])
        ->orderBy('bookings_count', 'desc')
        ->limit($limit);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('country', 'like', "%{$search}%")
            ->orWhere('city', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%");
    }

    // Methods
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/default-destination.jpg');
    }

    public function getGalleryUrlsAttribute()
    {
        if (empty($this->gallery)) {
            return [];
        }

        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->gallery);
    }

    public function getFullLocationAttribute()
    {
        return $this->city . ', ' . $this->country;
    }

    public function getAverageRatingAttribute()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    public function getTotalReviewsAttribute()
    {
        return $this->reviews()->count();
    }

    public function getTotalBookingsAttribute()
    {
        return $this->bookings()->count();
    }

    public function getActiveToursCountAttribute()
    {
        return $this->tours()->where('status', 'published')->count();
    }

    // Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($destination) {
            if (empty($destination->slug)) {
                $destination->slug = Str::slug($destination->name);
            }
        });

        static::updating(function ($destination) {
            if ($destination->isDirty('name') && empty($destination->slug)) {
                $destination->slug = Str::slug($destination->name);
            }
        });

        // static::deleting(function ($destination) {
        //     // Delete associated images
        //     if ($destination->featured_image) {
        //         \Storage::disk('public')->delete($destination->featured_image);
        //     }

        //     if ($destination->gallery) {
        //         foreach ($destination->gallery as $image) {
        //             \Storage::disk('public')->delete($image);
        //         }
        //     }

        //     // Delete tours (cascade)
        //     $destination->tours()->delete();
        // });
    }
}