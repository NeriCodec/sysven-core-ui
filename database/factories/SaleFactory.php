<?php

use Faker\Generator as Faker;


$factory->define(App\Sale::class, function (Faker $faker) {

    return [
        'num_sale' => $faker->randomNumber(),
        'num_articles' => $faker->randomNumber(),
        'total' => $faker->numberBetween(100,500),
        'detail' => $faker->paragraph,
        'users_id' => 1
    ];
});