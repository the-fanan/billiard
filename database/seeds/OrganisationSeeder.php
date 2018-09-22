<?php

use Illuminate\Database\Seeder;
use billiard\Models\organisation;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        organisation::create(['name' => 'Kwain']);
    }
}
