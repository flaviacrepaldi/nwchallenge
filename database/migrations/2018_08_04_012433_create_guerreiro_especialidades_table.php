<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuerreiroEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guerreiro_especialidades', function (Blueprint $table) {
            $table->integer('id_guerreiro')->unsigned();
            $table->foreign('id_guerreiro')->references('id_guerreiro')->on('guerreiros');
            $table->integer('id_especialidade')->unsigned();
            $table->foreign('id_especialidade')->references('id_especialidade')->on('especialidades');
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
        Schema::dropIfExists('guerreiro_especialidades');
    }
}
