<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerifiedOrRedirect
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('waiting');
        }

        return $next($request);
    }
}
