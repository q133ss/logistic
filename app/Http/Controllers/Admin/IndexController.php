<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Order;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $companies = User::orderBy('confirm', 'ASC')->where('confirm', '!=', 3)->get();
        return view('admin.index', compact('companies'));
    }

    public function accept($id){
        $company = User::find($id);
        $company->confirm = 1;
        $company->save();
        return back();
    }

    public function delete($id){
        $company = User::find($id);
        $company->delete();
        return back();
    }

    public function create(){
        $types = Type::all();
        $cities = City::all();
        return view('admin.create', compact('types', 'cities'));
    }

    public function orders(){
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.orders', compact('orders'));
    }

    public function orderDelete($id){
        $order = Order::find($id);
        $order->delete();
        return back();
    }
}
