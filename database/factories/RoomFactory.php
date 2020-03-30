<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
    return [
        'name' => strtoupper($faker->bothify('###-????')), 
        'notes' => $faker->sentence, 
        'status' => $faker->randomElement(['occupied', 'free']),
    ];
});
