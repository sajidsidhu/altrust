<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDmsAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->dms_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: DMS access only.');
    }
}
