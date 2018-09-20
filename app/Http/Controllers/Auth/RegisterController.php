<?php

namespace billiard\Http\Controllers\Auth;

use billiard\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use billiard\Models\user;
use billiard\Models\user_attribute;

use Carbon\Carbon;
use Cookie;

class RegisterController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        return view('frontend.registration.register');
    }


    /**
     * Register a new customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register()
    {
        $rules = [
            'fullname' => 'required|max:100',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|max:30|alpha',
        ];

        $validator = Validator::make($this->request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator->errors())->withInput($this->request->input());
        }

        $newUser = new user;

        $newUserData = $request->only("fullname","email","password");

        $newUser->fill($newUserData);
        $newUser->save();
        $user->assignRole($this->request->role);
        //add default attributes
        user_attribute::insert([
            [
                'user_id' => $newUser->id,
                'attribute' => Constants::PROFILE_IMAGE,
                'value' => Constants::DEFAULT_PROFILE_IMAGE,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        return  redirect()->to('/user/dashboard/');
    }

}
