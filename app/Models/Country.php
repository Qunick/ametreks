<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'image', 'is_active', 'order'
    ];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function trekTypes()
    {
        return $this->hasMany(TrekType::class)->whereNull('region_id');
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