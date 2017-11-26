<?php

use Faker\Generator as Faker;

$factory->define(App\SaleDetail::class, function (Faker $faker) {
    return [
        'sales_id' => 2,
        'products_id' => 3,
        'quantity' => $faker->numberBetween(1,100),
        'subtotal' => $faker->numberBetween(1,100)
    ];
});
