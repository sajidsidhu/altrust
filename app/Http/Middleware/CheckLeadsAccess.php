<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLeadsAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->leads_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Leads access only.');
    }
}
