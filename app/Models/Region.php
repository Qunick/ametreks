<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'country_id', 'name', 'slug', 'description', 'image', 'is_active', 'order'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function trekTypes()
    {
        return $this->hasMany(TrekType::class);
    }

    public function treks()
    {
        return $this->hasMany(Trek::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}