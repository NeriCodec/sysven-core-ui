<?php

use Faker\Generator as Faker;


$factory->define(App\Sale::class, function (Faker $faker) {

    return [
        'total' => $faker->numberBetween(10,100),
        'created_at' => $faker->dateTime,
        'users_id' => 1
    ];
});