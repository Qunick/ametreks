<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number',
        'trek_name',
        'is_offer',
        'is_private',
        'full_name',
        'email',
        'phone',
        'nationality',
        'passport_number',
        'date_of_birth',
        'passport_photo_path',
        'preferred_date',
        'group_size',
        'special_requests',
        'total_amount',
        'status',
        'payment_status',
        'payment_gateway',
        'transaction_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            $booking->booking_number = 'TREK-' . strtoupper(uniqid());
        });
    }
public function trek()
    {
        return $this->belongsTo(Trek::class);
    }
    // Accessor for formatted amount
    public function getFormattedAmountAttribute()
    {
        return '$' . number_format($this->total_amount, 2);
    }

    // Accessor for deposit amount (30%)
    public function getDepositAmountAttribute()
    {
        return $this->total_amount * 0.3;
    }

    public function getFormattedDepositAmountAttribute()
    {
        return '$' . number_format($this->deposit_amount, 2);
    }
}