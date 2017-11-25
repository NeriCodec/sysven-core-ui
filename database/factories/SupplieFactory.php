<?php

use Faker\Generator as Faker;

$factory->define(App\Supplie::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'address' => $faker->address
    ];
});