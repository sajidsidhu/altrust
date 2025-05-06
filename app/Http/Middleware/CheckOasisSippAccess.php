<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckOasisSippAccess
{
    public function handle($request, Closure $next)
    {
        
        if (Auth::check() && Auth::user()->oasis_sipp__check) {
            return $next($request);
        }
        
        abort(403, 'Unauthorized: Adviser access only.');
        
    }
}
