<?php

namespace App\Http\Middleware;

use Closure;

class FrontLogin
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
        if(empty(Session::has('ruchika')))
        {
            return redirect('front/login');
        }
        return $next($request);
    }
}
