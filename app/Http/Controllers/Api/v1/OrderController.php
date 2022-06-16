<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            'waypoint_id' => 'required',
            'user_id' => '',
            'name' => 'required',
            'phone' => 'required'
        ]);
        Order::create($validated);
        return response()->json(['data' => 'Success']);
    }

    public function getAll(){
        return Order::all();
    }

    public function getOrder($id){
        return Order::find($id);
    }

    public function getUserOrders($id){
        return Order::where('user_id',$id)->get();
    }
}
