<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    protected $fillable = [
        'id',
        'especialidade'
    ];

    public function guerreiros()    {
        return $this->belongsTo('App\Models\Guerreiro', 'especialidades_guerreiros',
            'id_especialidade', 'id_guerreiro');
     }
}
