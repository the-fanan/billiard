<?php

namespace billiard\Http\Controllers\Administrator\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use billiard\Http\Controllers\Controller;
use billiard\Constants\ResponseMessages as ResponseMessage;
use billiard\Models\administrator;
use billiard\Models\administrator_attribute;
use billiard\Constants\Constants;
use Auth;
use Validator;

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

    }

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }


    public function guard()
    {
        return Auth::guard('admin');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect(route('admin.login.show'))->withErrors($validator->errors())->withInput($request->input());
        }

        $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
        if($this->guard()->attempt($credentials, $request->input('remember'))){

            return redirect('/home');//should be dashboard for admin page
        }else{
            return back()->with('error', ResponseMessage::INVALID_LOGIN);
        }
    }

    public function logout() {
        $this->guard()->logout();
        return back()->with('success', ResponseMessage::GOODBYE);
    }
}
