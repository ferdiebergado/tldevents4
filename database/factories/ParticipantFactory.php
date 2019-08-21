<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participant;
use Faker\Generator as Faker;

$factory->define(Participant::class, function (Faker $faker) {
    return [
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'mi' => $faker->randomLetter,
        'sex' => $faker->randomElement(['M', 'F']),
        'mobile' => $faker->phoneNumber,
        'email' => $faker->email
    ];
});
