<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Type;
use App\Models\Waypoint;
use Illuminate\Http\Request;
use App\Services\FindTransportService;

class SearchController extends Controller
{
    public function findTransport($type, $from, $to){
        $find = new FindTransportService();
        return $find->find($type, $from, $to);
    }

    public function findFromForm($type_name, $from_name, $to_name){
        $type = Type::where('name', $type_name)->first()['id'];
        $from = City::where('name', $from_name)->first()['id'];
        $to = City::where('name', $to_name)->first()['id'];
        $find = new FindTransportService();
        return $find->find($type, $from, $to);
    }
}
