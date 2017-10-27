<?php

use Faker\Generator as Faker;

$factory->define(App\RoomType::class, function (Faker $faker) {
    return [
        'name' => $faker->lastName(),
        'base_price' => $faker->numberBetween(1, 20) * 50,
        'description' => $faker->paragraph()
    ];
});
