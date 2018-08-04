<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialidadesGuerreirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidades_guerreiros', function (Blueprint $table) {
            $table->integer('id_guerreiro')->unsigned()->nullable();
            $table->foreign('id_guerreiro')->references('id')->on('guerreiros')->onDelete('cascade');

            $table->integer('id_especialidade')->unsigned()->nullable();
            $table->foreign('id_especialidade')->references('id')->on('especialidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidades_guerreiros');
    }
}
