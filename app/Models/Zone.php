<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class)->withPivot('zone_id', 'zone_name', 'restaurant_id');
    }
}
