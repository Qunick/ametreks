<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrekItinerary extends Model
{
   protected $fillable = [
        'trek_id','day','title','altitude','location',
        'meal','description','activities','pro_tip','overnight', 'duration', 'distance', 'highlight'
    ];

    protected $casts = [
        'activities' => 'array',
        'highlight' => 'array',
    ];

    public function trek()
    {
        return $this->belongsTo(Trek::class);
    }
}
