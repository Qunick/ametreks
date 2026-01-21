<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuestInquiry extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'inquiry_id', 'first_name', 'last_name', 'email', 'phone',
        'avatar_color', 'inquiry_type', 'source', 'inquiry_message',
        'status', 'priority', 'internal_notes', 'last_contacted',
        'next_followup', 'contact_count', 'converted_user_id', 'converted_at'
    ];

    protected $casts = [
        'last_contacted' => 'datetime',
        'next_followup' => 'datetime',
        'converted_at' => 'datetime',
    ];

    // Relationships
    public function convertedUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'converted_user_id');
    }

    // Scopes
    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function scopeHighPriority($query)
    {
        return $query->where('priority', 'high');
    }

    public function scopePendingFollowup($query)
    {
        return $query->where('status', 'follow_up')
                    ->where('next_followup', '<=', now());
    }

    public function scopeConverted($query)
    {
        return $query->where('status', 'converted')
                    ->whereNotNull('converted_user_id');
    }

    // Methods
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function recordContact($notes = null)
    {
        $this->increment('contact_count');
        $this->update([
            'last_contacted' => now(),
            'next_followup' => now()->addDays(3),
            'internal_notes' => ($this->internal_notes ?? '') . "\n\n[" . now()->format('Y-m-d H:i') . "] " . ($notes ?? 'Contacted'),
        ]);
    }

    public function convertToUser($userId)
    {
        $this->update([
            'status' => 'converted',
            'converted_user_id' => $userId,
            'converted_at' => now(),
        ]);
    }

    public function sendWhatsAppMessage($message)
    {
        // Integration with WhatsApp service
        // Example: WhatsAppService::send($this->phone, $message);
    }

    public function sendEmail($subject, $message)
    {
        // Integration with mail service
        // Example: Mail::to($this->email)->send(new InquiryEmail($subject, $message));
    }
}