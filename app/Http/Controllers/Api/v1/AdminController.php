<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function accept($id){
        $company = User::find($id);
        $company->confirm = 1;
        $company->save();
        return response()->json(['data' => 'success']);
    }

    public function delete($id){
        $company = User::find($id);
        $company->delete();
        return response()->json(['data' => 'success']);
    }
}
