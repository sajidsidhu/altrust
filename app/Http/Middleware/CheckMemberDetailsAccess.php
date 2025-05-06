<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckMemberDetailsAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->member_details_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Member Details access only.');
    }
}
