<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->text,
        'venue' => $faker->address,
        'start_date' => $faker->date(),
        'end_date' => $faker->date()
    ];
});
