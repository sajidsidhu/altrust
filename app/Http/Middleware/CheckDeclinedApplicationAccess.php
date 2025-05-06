<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDeclinedApplicationAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->decline_applications != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Not Proceeding access only.');
    }
}
