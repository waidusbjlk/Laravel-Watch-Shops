<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Termwind\style;

class UserStatusMiddleware
{

    public function handle(Request $request, Closure $next){

        if (Auth::check() && Auth::user()->is_active ==false){
            Auth::logout();
            return redirect()->route('login.form')->withErrors('YOU ARE BANNED CALL ADMINISTRATOR!');
        }
        return $next($request);
    }
}
