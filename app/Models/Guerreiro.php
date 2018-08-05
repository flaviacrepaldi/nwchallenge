<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Guerreiro extends Model
{
    protected $fillable = [
        'nome',
        'id_tipo',
        'vida',
        'defesa',
        'dano',
        'velocidade_ataque',
        'velocidade_movimento',
        'imagem_guerreiro'
    ];

    public function especialidades() {
        return $this->belongsToMany('App\Models\Especialidade' , 
            'especialidades_guerreiros', 'id_especialidade', 'id_guerreiro');
     }

}
