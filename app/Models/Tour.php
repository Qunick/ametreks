<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Illuminate\Support\Facades\Storage;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination_id',
        'title',
        'slug',
        'description',
        'short_description',
        'duration_days',
        'duration_nights',
        'price',
        'discount_price',
        'max_participants',
        'min_participants',
        'current_participants',
        'departure_date',
        'return_date',
        'meeting_point',
        'inclusions',
        'exclusions',
        'itinerary',
        'terms_conditions',
        'featured_image',
        'gallery',
        'status',
        'is_featured',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'departure_date' => 'datetime',
        'return_date' => 'datetime',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'itinerary' => 'array',
        'gallery' => 'array',
        'price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'current_participants' => 'integer',
    ];

    // Relationships
    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('departure_date', '>', now());
    }

    public function scopeAvailable($query)
    {
        return $query->where('departure_date', '>', now())
            ->whereColumn('current_participants', '<', 'max_participants');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('short_description', 'like', "%{$search}%")
            ->orWhereHas('destination', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
    }

    // Methods
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/default-tour.jpg');
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

    public function getDurationAttribute()
    {
        return $this->duration_days . ' Days ' . $this->duration_nights . ' Nights';
    }

    public function getFinalPriceAttribute()
    {
        return $this->discount_price ?? $this->price;
    }

    public function getDiscountPercentageAttribute()
    {
        if ($this->discount_price && $this->price > 0) {
            return round((($this->price - $this->discount_price) / $this->price) * 100);
        }
        return 0;
    }

    public function getAvailableSpotsAttribute()
    {
        return $this->max_participants - $this->current_participants;
    }

    public function getIsAvailableAttribute()
    {
        return $this->departure_date > now() && $this->available_spots > 0;
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

    public function getTotalRevenueAttribute()
    {
        return $this->bookings()->where('status', 'confirmed')->sum('total_price');
    }

    public function increaseParticipants($count = 1)
    {
        $this->increment('current_participants', $count);
    }

    public function decreaseParticipants($count = 1)
    {
        $this->decrement('current_participants', $count);
    }

    // Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tour) {
            if (empty($tour->slug)) {
                $tour->slug = Str::slug($tour->title);
            }
        });

        static::updating(function ($tour) {
            if ($tour->isDirty('title') && empty($tour->slug)) {
                $tour->slug = Str::slug($tour->title);
            }
        });

        // static::deleting(function ($tour) {
        //     // Delete associated images
        //     if ($tour->featured_image) {
        //         \Storage::disk('public')->delete($tour->featured_image);
        //     }

        //     if ($tour->gallery) {
        //         foreach ($tour->gallery as $image) {
        //             \Storage::disk('public')->delete($image);
        //         }
        //     }

        //     // Delete related data
        //     $tour->bookings()->delete();
        //     $tour->reviews()->delete();
        //     $tour->wishlists()->delete();
        // });
    }
}