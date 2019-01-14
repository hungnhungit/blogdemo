<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,string $permissions)
    {

        $arrPermissions = explode('|',$permissions);
        if(auth()->check() && auth()->user()->hasPermission($permissions)){
            return $next($request);
        }
        return abort(403,'Unauthorized action');
    }
}
