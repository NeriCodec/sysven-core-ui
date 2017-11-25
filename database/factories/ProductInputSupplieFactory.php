<?php

use Faker\Generator as Faker;

$factory->define(\App\ProductInputSupplie::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomNumber(3),
        'amount' => $faker->randomNumber(2),
        'measure' => $faker->text(10),
        'supplies_id' => 1
    ];
});
