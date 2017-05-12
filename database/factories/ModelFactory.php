<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'profession' => $faker->sentence(1),
        'start_date' => $faker->dateTimeBetween(\Carbon\Carbon::now()->year('-4'), \Carbon\Carbon::now()),
        'home_phone' => $faker->phoneNumber,
        'mobile_phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'remember_token' => str_random(10),
    ];
});
