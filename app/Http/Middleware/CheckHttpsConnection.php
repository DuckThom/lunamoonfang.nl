<?php

namespace App\Http\Middleware;

use Closure, Redirect;

class CheckHttpsConnection
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
        if (!$request->secure())
        {
            return Redirect::secure($request->path());
        } else
        {
            return $next($request);
        }
    }
}
