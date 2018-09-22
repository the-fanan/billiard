<?php

use Faker\Generator as Faker;

$factory->define(billiard\dummy_data::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'department' => $faker->countryISOAlpha3,
        'admission_year' => $faker->date, // secret
        'graduation_year' => $faker->date
    ];
});
