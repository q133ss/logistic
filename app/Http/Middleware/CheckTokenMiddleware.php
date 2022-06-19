<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth()->check() && Auth()->user()->bearer_token == null){
            $user = User::find(Auth()->user()->id);
            $token = $user->createToken($user->device_name)->plainTextToken;
            $user->bearer_token = $token;
            $user->save();
            return $next($request);
        }else{
            return $next($request);
        }
    }
}
