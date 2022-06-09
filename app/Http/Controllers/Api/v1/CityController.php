<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getCities(){
        return ['data' => City::all()];
    }

    public function getCity($id){
        return ['data' => City::find($id)];
    }
}
