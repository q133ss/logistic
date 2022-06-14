<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\City;
use App\Models\Status;
use App\Models\Type;
use App\Models\Waypoint;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $types = Type::all();
        $cities = City::all();
        return view('company.index', compact('types', 'cities'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'type' => 'required',
            'departure_city_id' => 'required|int',
            'arrival_city_id' => 'required|int',
            'size' => 'required|string',
            'weight' => 'required',
            'departure_date' => ''
        ]);
        if(!$validated->fails()) {
            $waypoint = Waypoint::create($validated);
        }

        return to_route('company.waypoints');
    }

    public function waypoints(){
        $waypoints = Auth()->user()->get_waypoints;
        $statuses = Status::all();
        return view('company.waypoints', compact('waypoints', 'statuses'));
    }
}