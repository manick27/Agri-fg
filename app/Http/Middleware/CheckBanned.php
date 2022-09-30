<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lang;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $bannedMinutes = now()->diffInMinutes(auth()->user()->banned_until);
            auth()->logout();

            if ($bannedMinutes > 1440) {
                $message = 'Your account has been suspended for more than 24 hours. Please contact administrator.';
            } else {
                $message = 'Your account has been suspended for '.$bannedMinutes.' '.Str::plural('minute', $bannedMinutes).'. Please contact administrator.';
            }

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
