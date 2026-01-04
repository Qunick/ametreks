<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrekGallery extends Model
{
     protected $fillable = [
        'trek_id','image_path','alt_text','sort_order'
    ];

    public function trek()
    {
        return $this->belongsTo(Trek::class);
    }
}
