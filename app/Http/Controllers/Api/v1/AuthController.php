<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    $input = $request->all();
    $input['confirm'] = 0;
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);
    // 3

    $token = $user->createToken($request->device_name)->plainTextToken;
    // 4

    return response()->json(['token' => $token], 200);
}
}
