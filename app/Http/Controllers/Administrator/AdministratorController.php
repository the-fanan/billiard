<?php

namespace billiard\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use billiard\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use billiard\Models\user;
use billiard\Models\user_attribute;
use billiard\Models\administrator;
use billiard\Models\administrator_attribute;
use billiard\Models\organisation;
use billiard\Constants\Constants;
use billiard\Traits\Helper as BilliardHelpers;

class AdministratorController extends Controller
{
    use BilliardHelpers;
    private $admin;

    public function __construct()
    {
        $this->middleware(function($request, $next){
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function showAddTechnician()
    {
        return view('backend.manage-users');
    }

    public function addTechnician(Request $request)
    {
        $rules = [
            'fullname' => 'required|max:100',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $error = $this->validationMessagesToString($validator->errors());
            return response()->json([
                'error' => $error
            ],200);
        }

        $user = new user;
        $organisation = $this->admin->organisation();
        $role = "technician";
        $data = [
            "fullname" => $request->fullname,
            "email" => $request->email,
            "password" => $request->password,
            "organisation_id" => $organisation->id,
            "user" => $user,
            "role" => $role,

        ];

        $user = $this->saveUser($data);

        //send mail to user
        //$user::mailto bla bla bla
        return response()->json([
            'message' => "Technician has been created"
        ],200);
    }

    /**
    *Private functions
    **/
    /**
    *Save a new user
    *
    * @param $data ['fullname', 'email', 'password', 'organisation id','user', 'role']
    *
    * @return object
    */
    private function saveUser($data)
    {
        $modeldata = [
            "fullname" => $data["fullname"],
            "email" => $data["email"],
            "password" => $data["password"],
            "organisation_id" => $data["organisation_id"],
            "status" => "pending"
        ];
        $role = $data["role"];
        $user = $data["user"];
        $user->fill($modeldata);
        $user->save();
        $user->assignRole($role);
        //add default attributes
        user_attribute::insert([
            [
                'user_id' => $user->id,
                'attribute' => Constants::PROFILE_IMAGE,
                'value' => Constants::DEFAULT_PROFILE_IMAGE,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        return $user;
    }
    //for testing
    public function getSaveUser($data)
    {
        return $this->saveUser($data);
    }
}
