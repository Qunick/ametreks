<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'user_id',
        'payment_method',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'payment_details',
        'payment_date',
        'notes',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'datetime',
        'payment_details' => 'array',
    ];

    // Relationships
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeSuccess($query)
    {
        return $query->where('status', 'success');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeRefunded($query)
    {
        return $query->where('status', 'refunded');
    }

    public function scopeRecent($query, $days = 30)
    {
        return $query->where('created_at', '>=', now()->subDays($days));
    }

    // Methods
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'success' => 'green',
            'pending' => 'yellow',
            'failed' => 'red',
            'refunded' => 'purple',
            default => 'gray',
        };
    }

    public function markAsSuccess($transactionId = null)
    {
        $this->status = 'success';
        $this->transaction_id = $transactionId ?? $this->transaction_id;
        $this->payment_date = now();
        $this->save();

        // Update booking payment status
        $this->booking->updatePaymentStatus();
    }

    public function markAsFailed($notes = null)
    {
        $this->status = 'failed';
        $this->notes = $notes;
        $this->save();
    }

    public function refund($notes = null)
    {
        $this->status = 'refunded';
        $this->notes = $notes;
        $this->save();
    }

    public function isSuccessful()
    {
        return $this->status === 'success';
    }

    public function isRefunded()
    {
        return $this->status === 'refunded';
    }
}