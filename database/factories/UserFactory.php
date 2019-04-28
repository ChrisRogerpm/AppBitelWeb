<?php

use Faker\Generator as Faker;

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

//$factory->define(App\User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'remember_token' => str_random(10),
//    ];
//});
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'dni'=>$faker->unique()->numberBetween($min = 10000000, $max = 99999999),
        'celular' =>$faker->phoneNumber,
        'cargo_id' => 2,
        'password' => $password ?: $password = bcrypt('123123'),
        'estado' => 1,
        'remember_token' => str_random(10),
    ];
});

