<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPendingAccess
{
    public function handle($request, Closure $next)
    {
        
        if (Auth::check() && Auth::user()->offshore_pending) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Adviser access only.');
    }
}
