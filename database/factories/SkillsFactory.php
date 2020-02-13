<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Skills;
use Faker\Generator as Faker;

$factory->define(Skills::class, function (Faker $faker) {
    return [
       'name' => $faker->bs,
       'curriculum_id' => random_int(1, 40),
    ];
});
