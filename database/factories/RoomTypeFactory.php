<?php

use Faker\Generator as Faker;

$factory->define(App\RoomType::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName(),
        'base_price' => '',
        'description' => $faker->paragraph()
    ];
});
