<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Waypoint;
use Illuminate\Http\Request;

class WaypointController extends Controller
{
    public function get_data($id){
        $order = Waypoint::find($id);
        if($order){
            return ['data' => $order];
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

    public function update($id, Request $request){
        $validated = $request->validate([
            'car_status_id' => 'int',
            'passed' => 'max:100',
            'available_weight' => 'max:100',
            'available_size' => 'max:100'
        ]);
        Waypoint::find($id)->update($validated);
        return back();
    }

    public function delete($id){
        Waypoint::find($id)->delete();
        return back();
    }
}
