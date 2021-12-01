<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard == "mahasiswa" && Auth::guard($guard)->check()) {
            return redirect('/mahasiswa');
        }
        if ($guard == "dosen" && Auth::guard($guard)->check()) {
            return redirect('/dosen');
        }
        if (Auth::guard($guard)->check()) {
            return abort(403, "Not Authenticated");
        }

        return $next($request);
    }
}
