<?php

use Illuminate\Database\Seeder;
use billiard\Constants\Constants;
use billiard\Models\user;
use billiard\Models\user_attribute;
use billiard\Models\administrator;
use billiard\Models\administrator_attribute;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user1 = user::create(['fullname' => 'John Doe', 'email' => 'john123@yahoo.com', 'password' => 'john123']);
        user_attribute::create(['user_id' => $user1->id, 'attribute' => Constants::PROFILE_IMAGE, 'value' => Constants::DEFAULT_PROFILE_IMAGE]);
        $user1->assignRole('customer');

        $user2 = administrator::create(['fullname' => 'John Mark', 'email' => 'johnmark123@yahoo.com', 'password' => 'john123']);
        administrator_attribute::create(['administrator_id' => $user2->id, 'attribute' => Constants::PROFILE_IMAGE, 'value' => Constants::DEFAULT_PROFILE_IMAGE]);
        $user2->assignRole('Super Admin');
    }
}
