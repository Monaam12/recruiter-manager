<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'curriculum_id' => random_int(1, 40),
        'name' => $faker->catchPhrase,
        'description' => $faker->paragraph(rand(2, 6)),
        'start' => $faker->date,
        'end' => $faker->date,
    ];
});
