<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrekDeparture extends Model
{
    protected $fillable = [
        'trek_id','departure_date','price','currency',
        'spots_left','status','is_guaranteed'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'is_guaranteed' => 'boolean',
    ];

    public function trek()
    {
        return $this->belongsTo(Trek::class);
    }
}
