<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        //
        'firstname' => $faker->firstname($gender),
        'lastname' => $faker->lastname,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->e164PhoneNumber,
        'gender' => $gender,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'country' => $faker->country,
    ];
});
