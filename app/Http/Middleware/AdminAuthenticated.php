<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            app()->setLocale('uk');
            
            return redirect()->route('adminLogin');
        }

        return $next($request);
    }
}
