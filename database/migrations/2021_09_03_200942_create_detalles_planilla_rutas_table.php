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
            $table->unsignedBigInteger('planilla_id')->nullable();
            $table->foreign('planilla_id')
                ->references('id')
                ->on('planillas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ruta_id')->nullable();
            $table->foreign('ruta_id')
                ->references('id')
                ->on('rutas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('carro_id')->nullable();
            $table->foreign('carro_id')
                ->references('id')
                ->on('carros')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('precio')->nullable();
            $table->softDeletes();
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
