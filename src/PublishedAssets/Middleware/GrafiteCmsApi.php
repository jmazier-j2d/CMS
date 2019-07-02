<?php

namespace App\Http\Middleware;

use Closure;
use Config;

class GrafiteCmsApi
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
        if (Config::get('cms.api-token') == $request->get('token')) {
            if (Auth::check() && ($user = $request->user())) {
                if ($user->isRoot()) {
                    return $next($request);
                }
        }
        return response('Unauthorized.', 401);
    }
}
