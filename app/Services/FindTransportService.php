<?php
namespace App\Services;

use App\Models\Waypoint;

class FindTransportService{
//    public function __construct($type, $from, $to){
//        return $this->find($type, $from, $to);
//    }

    public function find($type, $from, $to){
        $waypoints = Waypoint::where('departure_city_id', $from)->where('arrival_city_id', $to)->where('type_id', $type)->where('car_status_id', 1)->get();
        return ['data' => collect($waypoints)];
    }
}
