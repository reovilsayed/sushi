<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function zones()
    {
        return $this->belongsToMany(Zone::class, 'restaurant_zone', 'restaurant_id', 'zone_id')
            ->withPivot('zone_name');
    }
}
