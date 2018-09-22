<?php

use Illuminate\Database\Seeder;
use billiard\Models\item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        item::create(["type" => "laptop", "brand" => "apple", "tag" => "423eedfed5", "problem" => "Wifi Card damaged", "user_id" => 1, "checked_in" => now()]);
    }
}
