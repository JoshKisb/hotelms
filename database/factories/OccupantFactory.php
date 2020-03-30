<?php

use Faker\Generator as Faker;

$factory->define(App\Occupant::class, function (Faker $faker) {
    $arrival_date = $faker->dateTimeInInterval('-5 days', '+5 days');
    $duration = $faker->numberBetween(1, 6);
    return [
        'arrival_date' => $arrival_date->format('Y-m-d'),
        'notes' => $faker->text,
        'duration' => $duration,
        'checkout_date' => $arrival_date->modify("+ $duration days")->format('Y-m-d'),
        'amount_paid' => 100,
        'status' => "checked_in",
    ];
});
