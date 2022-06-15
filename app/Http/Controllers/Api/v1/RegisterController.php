<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'confirm' => 'required',
            'company' => 'required',
            'contact_face' => 'required',
            'phone' => 'required',
            'bin' => 'required',
            'year' => 'required',
            'requisites' => 'required',
            'tenge_account' => '',
            'usd_account' => ''
        ]);
        User::create($validated);
        return response()->json(['data' => 'success']);
    }
}
