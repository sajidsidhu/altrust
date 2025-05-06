<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCommunicationAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->communication_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Communications access only.');
    }
}
