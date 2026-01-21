<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'color',
        'icon',
        'description',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Automatically generate slug from name
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tag) {
            $tag->slug = $tag->slug ?? Str::slug($tag->name);
        });

        static::updating(function ($tag) {
            if ($tag->isDirty('name')) {
                $tag->slug = Str::slug($tag->name);
            }
        });
    }

    /**
     * Get the treks that have this tag
     */
    public function treks(): BelongsToMany
    {
        return $this->belongsToMany(Trek::class, 'trek_tags');
    }

     public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

    /**
     * Scope active tags
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope popular tags (by trek count)
     */
    public function scopePopular($query, $limit = 10)
    {
        return $query->withCount('treks')
                    ->orderBy('treks_count', 'desc')
                    ->limit($limit);
    }

    /**
     * Get the color with opacity
     */
    public function getColorWithOpacity($opacity = 0.1)
    {
        if (str_starts_with($this->color, '#')) {
            $hex = str_replace('#', '', $this->color);
            if (strlen($hex) == 3) {
                $hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
            }
            
            // Convert to RGB
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
            
            return "rgba($r, $g, $b, $opacity)";
        }
        
        return $this->color;
    }

    /**
     * Get the text color based on background color
     */
    public function getTextColor()
    {
        if (str_starts_with($this->color, '#')) {
            $hex = str_replace('#', '', $this->color);
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
            
            // Calculate luminance
            $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
            
            return $luminance > 0.5 ? '#000000' : '#FFFFFF';
        }
        
        return '#000000';
    }
}