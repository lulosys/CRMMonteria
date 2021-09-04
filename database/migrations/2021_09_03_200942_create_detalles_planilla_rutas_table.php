<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesPlanillaRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_planilla_rutas', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('planilla_id');
            $table->unsignedInteger('ruta_id');
            $table->unsignedInteger('carro_id');
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
        Schema::dropIfExists('detalles_planilla_rutas');
    }
}
