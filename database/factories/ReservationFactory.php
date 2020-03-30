<?php

use Faker\Generator as Faker;

$factory->define(App\Reservation::class, function (Faker $faker) {
    $arrival_date = $faker->dateTimeInInterval('-1 days', '+14 days');
    $duration = $faker->numberBetween(1, 6);
    return [
	    'arrival_date' => $arrival_date->format('Y-m-d'),
	    'notes' => $faker->text,
	    'duration' => $duration,
	    'status' => 'pending',
    ];
});
