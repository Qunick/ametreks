<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrekInclusion extends Model
{
    protected $fillable = [
        'trek_id',
        'title',
        'description',
        'sort_order'
    ];

    public function trek(): BelongsTo
    {
        return $this->belongsTo(Trek::class);
    }
}