<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckOffshore
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->offshore_check) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Offshore access only.');
    }
}
