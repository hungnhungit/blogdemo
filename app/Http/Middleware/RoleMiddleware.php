<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,string $role)
    {
        $arrRole = explode('|',$role);
        if(auth()->check() && auth()->user()->hasRole($arrRole)){
            return $next($request);
        }
        return redirect()->route('home');

    }
}
