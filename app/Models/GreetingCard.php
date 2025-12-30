<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GreetingCard extends Model
{
     protected $fillable = [
        'image',
        'text',
    ];
}
