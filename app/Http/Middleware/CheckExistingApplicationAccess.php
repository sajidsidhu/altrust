<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckExistingApplicationAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->existing_applications != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Scheme Members access only.');
    }
}
