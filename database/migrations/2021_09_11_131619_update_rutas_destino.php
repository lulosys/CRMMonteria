<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateRutasDestino extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rutas', function (Blueprint $table) {
            DB::statement('alter table rutas modify destino varchar(50) null;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rutas', function (Blueprint $table) {
            DB::statement('alter table rutas modify destino varchar(50) not null;');
        });
    }
}
