<?php

use Faker\Generator as Faker;

$factory->define(App\PuntoVenta::class, function (Faker $faker) {
    return [
        'codigo_pdv' => $faker->numberBetween($min = 1000, $max = 4000),
        'nombre_punto_venta' => $faker->company,
        'agente_venta' => $faker->name,
        'recarga' => $faker->numberBetween($min = 100, $max = 2000),
        'direccion' => $faker->address,
        'dni' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'numero_referencia' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'latitud' => $faker->latitude($min = -90, $max = 90),
        'longitud' => $faker->longitude($min = -180, $max = 180),
    ];
});

//$table->increments('id');
//$table->string('codigo_pdv');
//$table->string('nombre_punto_venta')->nullable(true);
//$table->string('agente_venta')->nullable(true);
//$table->string('recarga');
//$table->string('direccion')->nullable(true);
//$table->string('dni')->nullable(true);
//$table->string('numero_referencia')->nullable(true);
//$table->string('latitud')->nullable(true);
//$table->string('longitud')->nullable(true);