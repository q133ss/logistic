<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Order;
use App\Models\Type;
use App\Services\FindTransportService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $types = Type::all();
        $cities = City::all();
        return view('index.index', compact('types', 'cities'));
    }

    public function find(Request $request){
        $find = new FindTransportService();
        $data = $find->find($request->type, $request->city1, $request->city2)['data'];
        if($data->count() > 0){
            return view('index.found', compact('data'));
        }else{
            return back()->withError('Не найдено');
        }
    }

    public function send(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:100',
            'phone' => 'required|max:25',
            'waypoint_id' => 'required|int'
        ]);
        Order::create($validate);
        return view('index.success');
    }
}
