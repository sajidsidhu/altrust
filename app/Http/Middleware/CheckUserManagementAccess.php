<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserManagementAccess
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->user_management_check != null) {
            return $next($request);
        }

        abort(403, 'Unauthorized: User Management access only.');
    }
}
