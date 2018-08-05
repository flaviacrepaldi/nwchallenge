<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Especialidade extends Model
{
    protected $fillable = [
        'especialidade'
    ];

    public function guerreiros() {
        return $this->belongsToMany('App\Models\Guerreiro', 'especialidades_guerreiros');
    }

    public static function excluirPorGuerreiro($guerreiro) {
        DB::table('especialidades_guerreiros')
                ->where('guerreiro_id', '=', $guerreiro)
                ->delete();
        return true;
    }
}
