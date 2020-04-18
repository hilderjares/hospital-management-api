<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Domain\Hospital\Hospital;
use Faker\Generator as Faker;

$factory->define(Hospital::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'city' => $faker->city,
    ];
});
