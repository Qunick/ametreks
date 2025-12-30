<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'author_id',
        'featured_image',
        'status',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'views',
        'category_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    // Relationships
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // public function category()
    // {
    //     return $this->belongsTo(BlogCategory::class);
    // }

    // public function tags()
    // {
    //     return $this->belongsToMany(BlogTag::class, 'blog_post_tags');
    // }

    // public function comments()
    // {
    //     return $this->hasMany(BlogComment::class);
    // }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Methods
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/default-blog.jpg');
    }

    public function getExcerptAttribute($value)
    {
        if ($value) {
            return $value;
        }
        return Str::limit(strip_tags($this->content), 150);
    }

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function isPublished()
    {
        return $this->status === 'published' && $this->published_at <= now();
    }

    // Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}