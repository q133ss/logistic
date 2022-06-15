<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Waypoint;
use Illuminate\Http\Request;

class WaypointsController extends Controller
{
    public function index(){
        $waypoints = Waypoint::all();
        $statuses = Status::all();
        return view('admin.waypoints', compact('waypoints', 'statuses'));
    }
}
