<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App ; 

class checkLang
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
        // $lang = session('lang');

        // App::setLocale($lang);

        

        if($request->query->has('lang')){
            $lang = $request->query('lang');
            app()->setLocale($lang);
            return $next($request);
        }else{
            app()->setLocale($request->segment(1));
            return $next($request);
        }
        
    }
}
