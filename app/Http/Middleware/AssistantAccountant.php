<?php

namespace App\Http\Middleware;

use Closure;

class AssistantAccountant
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
        if(Auth::user()->type!==3){
            return back();
        }
        return $next($request);
    }
}
