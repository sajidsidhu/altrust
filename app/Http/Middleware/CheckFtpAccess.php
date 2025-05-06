<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckFtpAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->ftp_check) {
            return $next($request);
        }

        abort(403, 'Unauthorized: Family Pension Trust access only.');
    }
}
