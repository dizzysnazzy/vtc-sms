<?php

namespace vtc\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='accounting')
            return $next($request);
       
        else
            return redirect()->back();
    }
}
