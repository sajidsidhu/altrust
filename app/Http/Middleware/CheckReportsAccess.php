<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckReportsAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->reports_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Reports access only.');
    }
}
