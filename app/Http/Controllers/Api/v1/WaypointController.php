<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Status;
use App\Models\Waypoint;
use App\Services\NewNotification;
use Illuminate\Http\Request;

class WaypointController extends Controller
{

    public function get_company($id){
        $order = Order::find($id);
        $waypoint = $order->get_waypoint;
        $company = $waypoint->get_user;
        return ['data' => $company];
    }

    public function get_data($id){
        $order = Waypoint::find($id);
        if($order){
            return ['data' => $order];
        }else{
            return response()->json('Not found');
        }
    }

    public function get_waypoint_from_order($id){
        $order = Order::find($id);
        $waypoint = $order->get_waypoint;
        if($waypoint){
            return ['data' => $waypoint];
        }else{
            return response()->json('Not found');
        }
    }

    public function get_statuses(){
        return ['data' => Status::all()];
    }

    public function get_status($id){
        $status = Status::find($id);
        if($status){
            return ['data' => $status];
        }else{
            return response()->json('Not found');
        }
    }

    public function create(Request $request){
        $validated = $request->validate([
            'user_id' => 'required',
            'type' => 'required',
            'departure_city_id' => 'required|int',
            'arrival_city_id' => 'required|int',
            'size' => 'required|string',
            'weight' => 'required',
            'departure_date' => '',
            'car_number' => ''
        ]);
        Waypoint::create($validated);
        return response()->json(['data' => 'Success']);
    }

    public function update($id, Request $request){
        $validated = $request->validate([
            'car_status_id' => '',
            'passed' => 'max:100',
            'available_weight' => 'max:100',
            'available_size' => 'max:100'
        ]);
        $waypoint = Waypoint::find($id);

        if($request->notification != null) {
            $notification = new NewNotification();
            $notification->updateWithMessage($id, $request->notification);
        }

        $waypoint->update($validated);
        return back();
    }

    public function delete($id){
        Waypoint::find($id)->delete();
        return back();
    }

    public function companyWaypoints($id){
        return Waypoint::where('user_id', $id)->get();
    }

    public function get_clients($id){
        $waypoint = Waypoint::find($id);
        return ['data' => $waypoint->get_phones];
    }
}
