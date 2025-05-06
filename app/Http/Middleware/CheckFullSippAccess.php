<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckFullSippAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->full_sipp_check) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Full SIPP access only.');
    }
}
