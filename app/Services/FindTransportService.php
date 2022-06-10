<?php
namespace App\Services;

use App\Models\Waypoint;

class FindTransportService{
//    public function __construct($type, $from, $to){
//        return $this->find($type, $from, $to);
//    }

    public function find($type, $from, $to){
        $waypoints = Waypoint::where('departure_city_id', $from)->where('arrival_city_id', $to)->get();
        $cars = []; //Array with found cars
        if($waypoints->count() > 0){
            foreach ($waypoints as $waypoint){
                $cars[] = $waypoint->get_cars->where('type_id', $type);
            }
            return ['data' => collect($cars)];
        }else{
            return response()->json('Not found');
        }
    }
}
