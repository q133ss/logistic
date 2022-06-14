<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','departure_date', 'travel_time', 'arrival_date', 'weight', 'size', 'packages_qty', 'departure_city_id', 'arrival_city_id', 'distance',
        'passed', 'type_id', 'car_number', 'car_status_id', 'available_weight', 'available_size'];

    public function get_user(){
        return $this->belongsTo(User::class);
    }

    public function get_departure_city(){
        return $this->hasOne(City::class, 'id', 'departure_city_id');
    }

    public function get_arrival_city_id(){
        return $this->hasOne(City::class, 'id', 'arrival_city_id');
    }

    public function get_type(){
        return $this->hasOne(Type::class, 'id', 'type_id');
    }

    public function get_status(){
        return $this->hasOne(Status::class, 'id', 'car_status_id');
    }
}
