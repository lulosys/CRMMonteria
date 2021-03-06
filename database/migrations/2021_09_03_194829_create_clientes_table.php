<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre','45');
            $table->string('apellido','45');
            $table->unsignedBigInteger('cedula')->nullable();
            $table->string('tipo_doc');
            $table->unsignedBigInteger('telefono')->nullable(true);
            $table->string('correo','50')->nullable(true);
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('destino_id');
            $table->foreign('destino_id')
                ->references('id')
                ->on('rutas')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('has_acompanante');
            $table->boolean('has_discapacitado');
            $table->string('tipo')
                ->comment('fijo,ocacional,tutela');
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
        Schema::dropIfExists('clientes');
    }
}
