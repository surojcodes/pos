<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->role=='admin'|| $user->role=='superadmin'){
            return $next($request);
        }
        return back()->with('error','Permission Denied!');
    }
}
