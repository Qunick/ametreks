<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trek extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'duration',
        'difficulty',
        'max_altitude',
        'region',
        'price',
        'best_season',
        'itinerary',
        'included',
        'excluded',
        'gallery_images',
        'is_featured',
        'rating',
        'reviews_count'
    ];

    protected $casts = [
        'best_season' => 'array',
        'itinerary' => 'array',
        'included' => 'array',
        'excluded' => 'array',
        'gallery_images' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'rating' => 'decimal:2'
    ];

}