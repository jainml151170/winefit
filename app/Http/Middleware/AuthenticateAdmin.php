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
    public function handle(Request $request, Closure $next, $userType): Response
    {
        // dd('userType : '.$userType);
        // dd('roll_id : '.Auth::User()->roll_id);
        // if (Auth::check() && Auth::User()->role_as == $userType) {
        if (Auth::check() && Auth::User()->roll_id == $userType) {
            return $next($request);
        } else {
            return redirect('/')->with('status','Please Login First');
        }
    }
}
