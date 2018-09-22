<?php

namespace billiard\Http\Controllers\Auth;

use billiard\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use billiard\Constants\ResponseMessages as ResponseMessage;
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('frontend.registration.login');
    }

    public function adminGaurd()
    {

    }

    public function webGaurd()
    {

    }

    public function logout() {
        $this->logout();
        return back()->with('success', ResponseMessage::GOODBYE);
    }
}
