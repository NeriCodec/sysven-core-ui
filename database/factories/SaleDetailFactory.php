<?php

use Faker\Generator as Faker;

$factory->define(App\SaleDetail::class, function (Faker $faker) {
    return [
        'sales_id' => 1,
        'products_id' => 2,
        'quantity' => $faker->numberBetween(1,100),
        'subtotal' => $faker->numberBetween(1,100)
    ];
});
