<?php
// app/Models/Review.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'trek_id',
        'name',
        'email',
        'rating',
        'comment',
        'status',
        'location',
        'verification_token',
        'verified_at'
    ];

    // Relationship with Trek
    public function trek()
    {
        return $this->belongsTo(Trek::class);
    }

    // Scope for approved reviews
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    // Scope for verified reviews
    public function scopeVerified($query)
    {
        return $query->whereNotNull('verified_at');
    }
}