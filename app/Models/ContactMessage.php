<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'read_at',
        'response',
        'responded_at',
        'responded_by',
    ];

    protected $casts = [
        'read_at' => 'datetime',
        'responded_at' => 'datetime',
    ];

    // Relationships
    public function responder()
    {
        return $this->belongsTo(User::class, 'responded_by');
    }

    // Scopes
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    public function scopeRead($query)
    {
        return $query->whereNotNull('read_at');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeResponded($query)
    {
        return $query->where('status', 'responded');
    }

    // Methods
    public function markAsRead()
    {
        if (!$this->read_at) {
            $this->read_at = now();
            $this->save();
        }
    }

    public function respond($response, $responderId = null)
    {
        $this->status = 'responded';
        $this->response = $response;
        $this->responded_at = now();
        // $this->responded_by = $responderId ?? auth()->id();
        $this->save();
    }
}