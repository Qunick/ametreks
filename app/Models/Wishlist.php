<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
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

    // Scopes
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeForTour($query, $tourId)
    {
        return $query->where('tour_id', $tourId);
    }

    // Methods
    public static function toggle($userId, $tourId)
    {
        $wishlist = self::where('user_id', $userId)
            ->where('tour_id', $tourId)
            ->first();

        if ($wishlist) {
            $wishlist->delete();
            return false; // Removed from wishlist
        } else {
            self::create([
                'user_id' => $userId,
                'tour_id' => $tourId,
            ]);
            return true; // Added to wishlist
        }
    }
}