<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermission::class);
        $this->call(UserSeeder::class);

        //factory(billiard\dummy_data::class, 50)->create();
    }
}
