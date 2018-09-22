<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use billiard\Models\user;
use billiard\Models\user_attribute;
use billiard\Constants\Constants;
use billiard\Http\Controllers\Auth\RegisterController;
use billiard\Http\Controllers\Administrator\AdministratorController;
class userTest extends TestCase
{
    public $data = ["fullname" => "fanan dala", "email" =>"", "password" => "password", "role" => "customer", "organisation_id" => 1, "user" => ""];
    public function notestGetUserDetails()
    {
        $user = user::find(1);
        $userDetails = $user->getUserDetails();
        $this->assertEquals($userDetails[Constants::PROFILE_IMAGE], Constants::DEFAULT_PROFILE_IMAGE);
    }

    public function testSaveUser()
    {
        $data = $this->data;
        $data["user"] = new user;
        $data["email"] =  str_random(3).".".str_random(3)."@".str_random(3).".com";
        $adminstratorController = new AdministratorController;
        $user = $adminstratorController->getSaveUser($data);
        $this->assertDatabaseHas("users", ["fullname" => "fanan dala", "email" => "fanan.dala@yahoo.com"]);
    }

}
