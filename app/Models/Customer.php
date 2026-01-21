<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'address',
        'city',
        'state',
        'postal_code',
        'preferences',
    ];

    // Relationships
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    // Methods
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function updateStats()
    {
        $this->update([
            'total_bookings' => $this->bookings()->count(),
            'total_spent' => $this->bookings()->where('payment_status', 'paid')->sum('amount'),
            'last_booking_date' => $this->bookings()->latest('trek_date')->first()?->trek_date,
        ]);
    }
}