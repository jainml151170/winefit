<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleId): Response
    {
        // echo "Role Id : ".$roleId;
        // echo "Role Id : ".Auth::User()->role_id;
        // dd();
        if (Auth::check() && Auth::User()->role_id === $roleId) {
            return $next($request);
        } 
        // Redirect based on the user's role
        if (Auth::check() && Auth::user()->role_id == 1) {
            return redirect('/distributor/dashboard');
        } else {
            return redirect('/winevendor/dashboard');
        }
    }
}
