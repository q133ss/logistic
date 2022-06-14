<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['waypoint_id', 'name', 'phone', 'user_id'];

    public function get_waypoint(){
        return $this->hasOne(Waypoint::class, 'id', 'waypoint_id');
    }
}
