<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDraftAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role !== 'live_member') {
            return $next($request);
        }

        abort(403, 'Unauthorized: No access to Draft Application.');
    }
}
