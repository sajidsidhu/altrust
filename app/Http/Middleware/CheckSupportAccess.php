<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSupportAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->support_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Support access only.');
    }
}
