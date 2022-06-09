<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;

    protected $fillable = ['departure_date', 'travel_time', 'arrival_date', 'weight', 'size', 'packages_qty', 'departure_city_id', 'arrival_city_id', 'distance',
        'passed'];

    public function get_cars(){
        return $this->belongsTo(Car::class);
    }
}
