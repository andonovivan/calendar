<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->text(30),
        'annotation' => $faker->text(10),
        'time_from' => $faker->date('Y-m-d h:i:s'),
        'time_to' => $faker->date('Y-m-d h:i:s')
    ];
});
