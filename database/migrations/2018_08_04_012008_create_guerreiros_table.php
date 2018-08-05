<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuerreirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guerreiros', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')->references('id')->on('tipos');
            
            $table->string('nome')->unique();
            $table->integer('vida');
            $table->integer('defesa');
            $table->integer('dano');
            $table->decimal('velocidade_ataque', 3, 1);
            $table->integer('velocidade_movimento');
            $table->string('imagem_guerreiro');
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
        Schema::dropIfExists('guerreiros');
    }
}
