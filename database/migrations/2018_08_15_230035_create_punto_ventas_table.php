<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntoVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punto_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zona')->nullable(true);
            $table->string('codigo_pdv');
            $table->string('nombre_punto_venta')->nullable(true);
            $table->string('agente_venta')->nullable(true);
            $table->string('recarga');
            $table->string('direccion')->nullable(true);
            $table->string('dni')->nullable(true);
            $table->string('numero_referencia')->nullable(true);
            $table->string('latitud')->nullable(true);
            $table->string('longitud')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('punto_ventas');
    }
}
