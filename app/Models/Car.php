<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_id',
        'workload',
        'waypoint_id',
        'available_weight',
        'available_size',
        'number'
    ];

    public function get_waypoint(){
        return $this->hasOne(Waypoint::class, 'waypoint_id');
    }
}
