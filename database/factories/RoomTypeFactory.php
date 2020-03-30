<?php

use Faker\Generator as Faker;

$factory->define(App\RoomType::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => str_slug($name),
        'description' => $faker->text,
        'price' => $faker->numberBetween(15, 99) * 10000,
    ];
});
