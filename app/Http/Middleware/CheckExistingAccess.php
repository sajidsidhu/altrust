<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckExistingAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->offshore_existing) {
            return $next($request);
        }
        
        abort(403, 'Unauthorized: Adviser access only.');
    }
}
