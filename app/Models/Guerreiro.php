<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function especialidades()    {
        return $this->belongsToMany('App\Models\Especialidade', 'especialidades_guerreiros');
    }

    public function consultaEspecialidades($id){
        $especialidades = DB::table('especialidades_guerreiros')
        ->join('especialidades', 'especialidades_guerreiros.especialidade_id', '=', 'especialidades.id')        
        ->where('especialidades_guerreiros.guerreiro_id', $id)
        ->get();

        return  $especialidades;
    }

    public function consultaTipoGuerreiro($id){
        $tipo = DB::table('tipos')
        ->join('guerreiros', 'tipos.id', '=', 'guerreiros.id_tipo')        
        ->where('tipos.id', $id)
        ->where('guerreiros.id', $this->id)
        ->first();

        return  $tipo->tipo;
    }

    public static function existsByTipo($tipo) {
        $exists = DB::table('guerreiros')
                    ->where('id_tipo', '=', $tipo)
                    ->count();
        return $exists > 0;
    }

    public static function excluirPorTipo($tipo) {
        DB::table('guerreiros')
                ->where('id_tipo', '=', $tipo)
                ->delete();
        return true;
    }

    public static function existePorEspecialidade($especialidade) {
        $existe = DB::table('especialidades_guerreiros')
                        ->where('especialidade_id', '=', $especialidade)
                        ->count();
        return $existe > 0;
    }

    public static function excluirPorEspecialidade($especialidade) {
        $items = DB::table('especialidades_guerreiros')
                    ->where('especialidade_id', '=', $especialidade)
                    ->select('guerreiro_id')
                    ->get();

        foreach($items as $item) {
            DB::table('guerreiros')
                    ->where('id', '=', $item->guerreiro_id)
                    ->delete();
        }
        
        DB::table('especialidades_guerreiros')
                ->where('especialidade_id', '=', $especialidade)
                ->delete();
        return true;
    }
}
