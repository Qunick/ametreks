<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'guide_id', 'first_name', 'last_name', 'email', 'phone',
        'avatar_color', 'years_experience', 'languages', 'certifications',
        'rating', 'availability_status', 'leave_start', 'leave_end',
        'emergency_contact_name', 'emergency_contact_phone',
        'total_treks', 'completed_treks', 'average_rating'
    ];

    protected $casts = [
        'languages' => 'array',
        'leave_start' => 'date',
        'leave_end' => 'date',
        'last_assignment' => 'datetime',
        'rating' => 'decimal:2',
        'average_rating' => 'decimal:2',
    ];

    // Relationships
    public function assignments(): MorphMany
    {
        return $this->morphMany(StaffAssignment::class, 'assignable');
    }

    // Scopes
    public function scopeAvailable($query)
    {
        return $query->where('availability_status', 'available');
    }

    public function scopeByExperience($query, $years)
    {
        return $query->where('years_experience', '>=', $years);
    }

    public function scopeByLanguage($query, $language)
    {
        return $query->whereJsonContains('languages', $language);
    }

    public function scopeHighRated($query)
    {
        return $query->where('average_rating', '>=', 4.0);
    }

    // Methods
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function assignToTrek($trekId, $startDate, $endDate, $role, $dailyRate, $notes = null)
    {
        return $this->assignments()->create([
            'trek_id' => $trekId,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'role' => $role,
            'daily_rate' => $dailyRate,
            'notes' => $notes,
        ]);
    }

    public function updateStats()
    {
        $completedAssignments = $this->assignments()->where('status', 'completed')->count();
        $this->update([
            'total_treks' => $this->assignments()->count(),
            'completed_treks' => $completedAssignments,
            'last_assignment' => $this->assignments()->latest('end_date')->first()?->end_date,
        ]);
    }

    public function sendWhatsAppNotification($message)
    {
        // Integration with WhatsApp service
        // Example: WhatsAppService::send($this->phone, $message);
    }
}