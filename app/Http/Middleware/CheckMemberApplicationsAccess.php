<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckMemberApplicationsAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->member_applications_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Member Applications access only.');
    }
}
