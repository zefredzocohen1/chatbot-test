<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $authority = config('constants.authority');
            if(Auth::user()->authority == $authority['admin']){
                return redirect('user');
            } elseif(Auth::user()->authority == $authority['client']){
                return redirect('dashboard');
            }
        }

        return $next($request);
    }
}
