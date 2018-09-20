<?php

use Illuminate\Database\Seeder;

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
        $user1 = billiard\Models\user::create(['fullname' => 'John Doe', 'email' => 'john123@yahoo.com', 'password' => 'john123']);
        $user1->assignRole('customer');
        
        $user2 = billiard\Models\administrator::create(['fullname' => 'John Mark', 'email' => 'johnmark123@yahoo.com', 'password' => 'john123']);
        $user2->assignRole('Super Admin');
    }
}
