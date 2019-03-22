<?php

namespace vtc\Http\Middleware;

use Closure;
use Sentinel;

class SystemMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='system')
            return $next($request);
        else
            return redirect()->back();
    }
}
