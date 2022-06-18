<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderPhone;
use App\Models\Type;
use App\Models\Waypoint;
use App\Services\NewNotification;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $types = Type::all();
        $cities = City::all();
        return view('client.index', compact('types', 'cities'));
    }

    public function get(Request $request){
        $waypoints = Waypoint::where('type_id', $request->type)->where('departure_city_id', $request->city1)->where('arrival_city_id',$request->city2)->get();
        return view('client.get', compact('waypoints'));
    }

    public function send(Request $request){
        $validated = $request->validate([
            'name' => 'max:100',
            'phone' => 'max:24',
            'user_id' => 'int',
            'waypoint_id' => 'required|max:100'
        ]);
        Order::create($validated);
        $notification = new NewNotification();
        $notification->newOrder($request->waypoint_id);

        return to_route('client.orders');
    }

    public function orders(){
        $orders = OrderPhone::where('phone', Auth()->user()->phone)->get();
        return view('client.orders', compact('orders'));
    }
}
