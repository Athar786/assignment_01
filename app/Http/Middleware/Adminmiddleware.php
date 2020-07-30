<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Adminmiddleware
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
        if(Auth::user()->email == "admin@gmail.com")
        {
            return $next($request);
        }
        else
        {
            return redirect('/home')->with('status','Your are Not Allowed to Admin Dashboard');
        }
        
    }
}
