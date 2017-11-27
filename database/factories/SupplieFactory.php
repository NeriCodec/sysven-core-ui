<?php

use Faker\Generator as Faker;

$factory->define(App\Supply::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'address' => $faker->address
    ];
});