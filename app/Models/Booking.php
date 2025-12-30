<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tour_id',
        'booking_number',
        'participants_count',
        'total_price',
        'deposit_amount',
        'deposit_paid',
        'payment_status',
        'status',
        'special_requests',
        'cancellation_reason',
        'cancelled_at',
        'notes',
        'payment_method',
        'transaction_id',
        'payment_date',
    ];

    protected $casts = [
        'deposit_paid' => 'boolean',
        'total_price' => 'decimal:2',
        'deposit_amount' => 'decimal:2',
        'cancelled_at' => 'datetime',
        'payment_date' => 'datetime',
        'participants_count' => 'integer',
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

    // public function participants()
    // {
    //     return $this->hasMany(BookingParticipant::class);
    // }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('booking_number', 'like', "%{$search}%")
            ->orWhereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            })
            ->orWhereHas('tour', function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            });
    }

    // Methods
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'yellow',
            'confirmed' => 'green',
            'cancelled' => 'red',
            'completed' => 'blue',
            default => 'gray',
        };
    }

    public function getPaymentStatusColorAttribute()
    {
        return match($this->payment_status) {
            'pending' => 'yellow',
            'paid' => 'green',
            'partially_paid' => 'blue',
            'failed' => 'red',
            'refunded' => 'purple',
            default => 'gray',
        };
    }

    public function getRemainingBalanceAttribute()
    {
        $paid = $this->payments()->where('status', 'success')->sum('amount');
        return $this->total_price - $paid;
    }

    public function getIsFullyPaidAttribute()
    {
        return $this->remaining_balance <= 0;
    }

    public function getCanBeCancelledAttribute()
    {
        return $this->status === 'confirmed' && 
               $this->tour->departure_date > now()->addDays(2);
    }

    public function getCancellationFeeAttribute()
    {
        if (!$this->can_be_cancelled) {
            return $this->total_price;
        }

        $daysUntilDeparture = $this->tour->departure_date->diffInDays(now());

        if ($daysUntilDeparture > 30) {
            return $this->total_price * 0.1; // 10% fee
        } elseif ($daysUntilDeparture > 14) {
            return $this->total_price * 0.25; // 25% fee
        } elseif ($daysUntilDeparture > 7) {
            return $this->total_price * 0.5; // 50% fee
        } else {
            return $this->total_price * 0.75; // 75% fee
        }
    }

    public function getRefundAmountAttribute()
    {
        return $this->total_price - $this->cancellation_fee;
    }

    public function generateBookingNumber()
    {
        if (empty($this->booking_number)) {
            $this->booking_number = 'BK-' . strtoupper(uniqid());
        }
        return $this->booking_number;
    }

    public function confirmBooking()
    {
        $this->status = 'confirmed';
        $this->tour->increaseParticipants($this->participants_count);
        $this->save();
    }

    public function cancelBooking($reason = null)
    {
        $this->status = 'cancelled';
        $this->cancellation_reason = $reason;
        $this->cancelled_at = now();
        $this->tour->decreaseParticipants($this->participants_count);
        $this->save();
    }

    public function completeBooking()
    {
        $this->status = 'completed';
        $this->save();
    }

    // Events
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($booking) {
            $booking->generateBookingNumber();
            
            // Calculate total price
            if (empty($booking->total_price)) {
                $booking->total_price = $booking->tour->final_price * $booking->participants_count;
            }
            
            // Calculate deposit amount (20% of total)
            if (empty($booking->deposit_amount)) {
                $booking->deposit_amount = $booking->total_price * 0.2;
            }
        });

        static::created(function ($booking) {
            // Send booking confirmation email
            // Notification::send($booking->user, new BookingConfirmation($booking));
        });

        static::updated(function ($booking) {
            if ($booking->wasChanged('status')) {
                // Send status update notification
                // Notification::send($booking->user, new BookingStatusUpdated($booking));
            }
        });
    }
}