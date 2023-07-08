<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){

            $expiresAt = Carbon::now()->addMinutes(4);
            Cache::put('user-is-online' .Auth::id() , true , $expiresAt);

            Auth::user()->update(['last_seen' => now(),'updated_at' => DB::raw('updated_at')]);


        }
        return $next($request);
    }
}
