<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPendingApplicationAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->pending_applications != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Pending Application access only.');
    }
}
