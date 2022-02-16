<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class LastUserActivity
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
        if (Auth::check()) {
            # code...
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);

            // last seen
            User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);
        }
        return $next($request);
    }
}
