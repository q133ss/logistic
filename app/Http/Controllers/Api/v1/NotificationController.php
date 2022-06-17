<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function read(){
        $notifications = Auth()->user()->get_notifications->where('is_old',0);
        foreach ($notifications as $notification){
            $notification->is_old = 1;
            $notification->save();
        }
        return response()->json(['data' => 'success']);
    }
}
