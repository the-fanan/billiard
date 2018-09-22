<?php

use Illuminate\Database\Seeder;
use billiard\Models\repair_request;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        repair_request::create(["item_id" => 1, "technician" => 2]);
    }
}
