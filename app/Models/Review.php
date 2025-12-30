<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
        'booking_id',
        'rating',
        'title',
        'comment',
        'status',
        'approved_at',
        'approved_by',
    ];

    protected $casts = [
        'rating' => 'integer',
        'approved_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    // Scopes
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopeWithHighRating($query, $minRating = 4)
    {
        return $query->where('rating', '>=', $minRating);
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // Methods
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'approved' => 'green',
            'pending' => 'yellow',
            'rejected' => 'red',
            default => 'gray',
        };
    }

    public function getRatingStarsAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }

    public function approve($approverId = null)
    {
        $this->status = 'approved';
        $this->approved_at = now();
        // $this->approved_by = $approverId ?? auth()->id();
        $this->save();

        // Update tour average rating
        $this->tour->updateAverageRating();
    }

    public function reject()
    {
        $this->status = 'rejected';
        $this->save();
    }

    public function isApproved()
    {
        return $this->status === 'approved';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isRejected()
    {
        return $this->status === 'rejected';
    }

    // Events
    protected static function boot()
    {
        parent::boot();

        static::created(function ($review) {
            // Update tour average rating
            $review->tour->updateAverageRating();
        });

        static::updated(function ($review) {
            if ($review->wasChanged('rating') || $review->wasChanged('status')) {
                // Update tour average rating if rating changed or status changed to approved
                $review->tour->updateAverageRating();
            }
        });

        static::deleted(function ($review) {
            // Update tour average rating
            $review->tour->updateAverageRating();
        });
    }
}