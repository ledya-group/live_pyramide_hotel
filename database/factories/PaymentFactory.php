<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'payment_type_id' => '',
        'bill_id' => '',
        'amount' => '',
        'description' => $faker->paragraph()
    ];
});
