<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' 				=> $faker->name,
        'apellido'			=> $faker->lastname,
        'email' 			=> $faker->unique()->safeEmail,
        'rut'				=> $faker->numberBetween($min = 111111111, $max = 999999999),
        'direccion' 		=> $faker->address,
        'telefono'			=> $faker->phoneNumber,
        'email_verified_at' => now(),
        'password' 			=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' 	=> Str::random(10),
    ];
});
