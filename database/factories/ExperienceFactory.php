<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Experience;
use Faker\Generator as Faker;

$factory->define(Experience::class, function (Faker $faker) {
    return [
        'curriculum_id' => random_int(1, 40),
        'company' => $faker->company,
        'job' => $faker->jobTitle,
        'description' => $faker->paragraph(rand(2, 6)),
        'start' => $faker->date,
        'end' => $faker->date,
    ];
});
