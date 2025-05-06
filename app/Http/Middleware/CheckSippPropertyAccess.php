<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSippPropertyAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->sipp_property_check) {
            return $next($request);
        }

        abort(403, 'Unauthorized: SIPP Property access only.');
    }
}
