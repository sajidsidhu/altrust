<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdviserApplicationsAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->adviser_applications_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Advisor Applications access only.');
    }
}
