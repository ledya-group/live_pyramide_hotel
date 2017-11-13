<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'email' => $faker->safeEmail(),
        'company' => $faker->company(),
        'phone' => $faker->phoneNumber(),
        'country' => $faker->country(),
        'city' => $faker->city(),
        'address' => $faker->address()
    ];
});
