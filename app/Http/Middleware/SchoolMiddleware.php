<?php

namespace vtc\Http\Middleware;

use Closure;
use Sentinel;

class SchoolMiddleware
{

    public function handle($request, Closure $next)
    {
       if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='admin')
            return $next($request);

        else
            return redirect()->back();
    }
}
