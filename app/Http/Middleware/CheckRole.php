<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (Auth::check() == 1) {
            if($role == 'admin' && auth()->user()->role_id == 1)
            {
                return $next($request);
            }
            elseif($role == 'hrd' && auth()->user()->role_id == 2)
            {
                return $next($request);
            }
            elseif($role == 'gudang' && auth()->user()->role_id == 3)
            {
                return $next($request);
            }
            else
            {
                abort(code:403);
            }
        }
        else
        {
                abort(code:403);
        }
        return $next($request);
    }
}
