<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate as admin
        if (Auth::guard('admin')->attempt($credentials)) {
            // Redirect to admin dashboard
            return redirect()->route('admin.dashboard');
            // dd('admin');
        }

        // Attempt to authenticate as regular user
        if (Auth::attempt($credentials)) {

            if (Auth::user()->role_id == 1 ){
                return redirect()->route('distributor.dashboard');
            }
            if (Auth::user()->role_id == 2 ){
                return redirect()->route('winevendor.dashboard');
            }
        }

        // Handle failed login attempt
        return redirect()->route('login')->with('error', 'Invalid credentials');
    }
}
