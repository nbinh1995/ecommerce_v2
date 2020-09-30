<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
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
            if (auth()->user()->isAdmin()) {
                return $next($request);
            }
            Auth::logout();
            $request->session()->flush();
            return redirect('/login')->withFlashDanger(__('Not_Admin'));
        }
        return redirect('/login')->withFlashDanger(__('Unauthenticated'));
    }
}
