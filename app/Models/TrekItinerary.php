<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrekItinerary extends Model
{
   protected $fillable = [
        'trek_id','day','title','altitude','location',
        'meal','description','activities','pro_tip'
    ];

    protected $casts = [
        'activities' => 'array',
    ];

    public function trek()
    {
        return $this->belongsTo(Trek::class);
    }
}
