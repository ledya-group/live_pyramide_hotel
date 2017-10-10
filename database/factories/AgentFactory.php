<?php

use Faker\Generator as Faker;

$factory->define(App\Agent::class, function (Faker $faker) {
    return [
        // 'title' => $faker->title(),
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'email' => $faker->safeEmail(),
        'phone' => $faker->phoneNumber(),
        'role_id' => $faker->numberBetween(1, 2)
    ];
});
