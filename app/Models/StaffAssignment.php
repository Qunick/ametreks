<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffAssignment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'trek_id', 'assignable_type', 'assignable_id', 'start_date',
        'end_date', 'role', 'daily_rate', 'notes', 'whatsapp_sent',
        'email_sent', 'calendar_added', 'status', 'confirmed_at', 'completed_at'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'daily_rate' => 'decimal:2',
        'confirmed_at' => 'datetime',
        'completed_at' => 'datetime',
        'whatsapp_sent' => 'boolean',
        'email_sent' => 'boolean',
        'calendar_added' => 'boolean',
    ];

    // Relationships
    public function trek(): BelongsTo
    {
        return $this->belongsTo(Trek::class);
    }

    public function assignable(): MorphTo
    {
        return $this->morphTo();
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

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // Methods
    public function confirm()
    {
        $this->update([
            'status' => 'confirmed',
            'confirmed_at' => now(),
        ]);
    }

    public function complete()
    {
        $this->update([
            'status' => 'completed',
            'completed_at' => now(),
        ]);
        
        $this->assignable->updateStats();
    }

    public function getTotalCostAttribute(): float
    {
        $days = $this->start_date->diffInDays($this->end_date) + 1;
        return $this->daily_rate * $days;
    }
}
