<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use billiard\Models\user;
use billiard\Models\user_attribute;

class userTest extends TestCase
{

    public function testGetUserDetails()
    {
        $user = user::find(1);
        $userDetails = $user->getUserDetails();
        $this->assertEquals($userDetails['profile_image'], 'default3.jpg');
    }
}
