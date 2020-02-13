<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Curriculum;
use Faker\Generator as Faker;

$factory->define(Curriculum::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
         'age' => random_int(20, 29),
         'job' => $faker->jobTitle,
         'address' => $faker->address,
         'phone' => random_int(24644840, 24657459),
        'about' => $faker->paragraph(1),
        'user_id' => factory(App\User::class)->create()->id,
    ];
});
