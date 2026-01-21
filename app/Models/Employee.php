<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'employment_id', 'first_name', 'last_name', 'email', 'phone',
        'avatar_color', 'avatar_image', 'department', 'role', 'joined_date',
        'status', 'last_active', 'leave_start', 'leave_end', 'leave_reason',
        'permissions'
    ];

    protected $casts = [
        'joined_date' => 'date',
        'leave_start' => 'date',
        'leave_end' => 'date',
        'last_active' => 'datetime',
        'permissions' => 'array',
    ];

    // Relationships
    public function leaves(): HasMany
    {
        return $this->hasMany(EmployeeLeave::class);
    }

    // Scopes
    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }

    public function scopeByRole($query, $role)
    {
        return $query->where('role', $role);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOnLeave($query)
    {
        return $query->where('status', 'on_leave');
    }

    // Methods
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function assignLeave($startDate, $endDate, $reason = null)
    {
        $this->update([
            'status' => 'on_leave',
            'leave_start' => $startDate,
            'leave_end' => $endDate,
            'leave_reason' => $reason,
        ]);
    }

    public function endLeave()
    {
        $this->update([
            'status' => 'active',
            'leave_start' => null,
            'leave_end' => null,
            'leave_reason' => null,
        ]);
    }

    public function hasPermission($permission): bool
    {
        if ($this->role === 'admin') {
            return true;
        }

        $permissions = $this->permissions ?? [];
        return in_array($permission, $permissions);
    }

    public function updateLastActive()
    {
        $this->update(['last_active' => now()]);
    }
}