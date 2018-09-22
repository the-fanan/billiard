<?php

namespace billiard\Http\Controllers\Auth;

use billiard\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use billiard\Models\user;
use billiard\Models\user_attribute;
use billiard\Models\administrator;
use billiard\Models\administrator_attribute;
use billiard\Models\organisation;
use billiard\Constants\Constants;

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

    public function showRegistrationForm()
    {
        return view('frontend.registration.register');
    }


    /**
     * Register a new customer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $rules = [
            'fullname' => 'required|max:100',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
            'organisation' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/register')->withErrors($validator->errors())->withInput($request->input());
        }

        //create organisation
        $newOrganisation = organisation::create(['name' => $request->organisation]);

        $newAdmin = new administrator;

        $newAdminData = $request->only("fullname","email","password");
        $newAdminData["organisation_id"] = $newOrganisation->id;

        $newAdmin->fill($newAdminData);
        $newAdmin->save();
        $newAdmin->assignRole('Admin');
        //add default attributes
        administrator_attribute::insert([
            [
                'administrator_id' => $newAdmin->id,
                'attribute' => Constants::PROFILE_IMAGE,
                'value' => Constants::DEFAULT_PROFILE_IMAGE,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        return  redirect()->to('/');
    }

}
