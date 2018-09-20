<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use billiard\Models\user;
use billiard\Models\user_attribute;
use billiard\Constants\Constants;

class userTest extends TestCase
{

    public function testGetUserDetails()
    {
        $user = user::find(1);
        $userDetails = $user->getUserDetails();
        $this->assertEquals($userDetails[Constants::PROFILE_IMAGE], Constants::DEFAULT_PROFILE_IMAGE);
    }
}
