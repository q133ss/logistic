<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function getTypes(){
        return ['data' => Type::all()];
    }

    public function getType($id){
        return ['data' => Type::find($id)];
    }
}
