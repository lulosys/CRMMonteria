<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('marca','45');
            $table->unsignedInteger('modelo');
            $table->string('placa','7');
            $table->unsignedBigInteger('conductor_id');
            $table->foreign('conductor_id')
                ->references('id')
                ->on('conductores')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('capacidad_pasajeros');
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
        Schema::dropIfExists('carros');
    }
}
