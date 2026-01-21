<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'location',
        'trek_id',
        'title',
        'rating',
        'comment',
        'status',
    ];

    /* -----------------------------
       Relationships
    ------------------------------ */

    public function trek()
    {
        return $this->belongsTo(Trek::class);
    }

    public function photos()
    {
        return $this->hasMany(ReviewPhoto::class);
    }

    /* -----------------------------
       Scopes (for filters)
    ------------------------------ */

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
