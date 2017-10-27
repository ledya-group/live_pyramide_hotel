<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    // $room_type = factory(App\RoomType::class)->create();

    return [
        'name' => $faker->lastName(),
        'description' => $faker->paragraph(),
        'room_type_id' => '',
        'status' => ''
    ];
});
