<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd(Auth::user()->is_admin);
        if(Auth::user() && Auth::user()->is_admin==1){
            return $next($request);
        }else{
            return redirect('/');
        }
       // return $next($request);
    }
}
