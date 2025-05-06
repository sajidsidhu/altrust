<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckTicketsAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->tickets_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Tickets access only.');
    }
}
