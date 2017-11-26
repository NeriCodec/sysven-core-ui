<?php

use Faker\Generator as Faker;

$factory->define(App\SaleDetail::class, function (Faker $faker) {
    return [
        'sales_num_sale' => 1,
        'products_id' => 1
    ];
});
