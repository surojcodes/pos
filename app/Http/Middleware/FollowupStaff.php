<?php

namespace App\Http\Middleware;

use Closure;

class FollowupStaff
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
        if(Auth::user()->type!==4){
            return back();
        }
        return $next($request);
    }
}