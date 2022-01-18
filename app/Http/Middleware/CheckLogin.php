<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if($request['name']=="admin" && $request['password']=="123456"){
            return $next($request);
        }else{
            return response()->view('welcome') ;
        }
        
    }
}
