<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdviser
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->adviser_check) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Adviser access only.');
    }
}
