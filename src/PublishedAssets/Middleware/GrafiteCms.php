<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Access\Gate as Gate;
use Illuminate\Support\Facades\Auth;

use Closure;


class GrafiteCms
{
    
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && ($user = $request->user())) {
            if ($user->isRoot())
                return $next($request);
        }
        return response('Unauthorized.', 401);
    }
}
