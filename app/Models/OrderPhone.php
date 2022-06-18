<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPhone extends Model
{
    use HasFactory;

    protected $fillable = ['waypoint_id', 'phone'];

    public function get_waypoint(){
        return $this->hasOne(Waypoint::class, 'id', 'waypoint_id');
    }
}
