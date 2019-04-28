<?php

use Faker\Generator as Faker;

$factory->define(App\Recarga::class, function (Faker $faker) {
    return [
        'punto_venta_id' => $faker->numberBetween($min = 2, $max = 95),
        'usuario_id' => $faker->numberBetween($min = 1, $max = 100),
        'imagen_adjunta' => $faker->imageUrl($width = 640, $height = 480),
        'monto' => $faker->numberBetween($min = 1000, $max = 9000),
        'latitud' => $faker->latitude($min = -90, $max = 90),
        'longitud' => $faker->longitude($min = -180, $max = 180),
    ];
});

