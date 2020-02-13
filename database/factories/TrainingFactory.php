<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Training;
use Faker\Generator as Faker;

$factory->define(Training::class, function (Faker $faker) {
    return [
        'curriculum_id' => random_int(1, 40),
        'name' => $faker->catchPhrase,
        'school' => $faker->company,
        'description' => $faker->paragraph(rand(2, 6)),
        'start' => $faker->date,
        'end' => $faker->date,
    ];
});
