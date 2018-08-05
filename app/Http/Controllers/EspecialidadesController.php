<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidade;
use App\Models\Guerreiro;

class EspecialidadesController extends Controller
{
    public function index() {
        $especialidades = Especialidade::get();

        return view('especialidades.listaespecialidades', compact('especialidades'));
    }

    public function novo(){
        return view('especialidades.formespecialidades');
    }

    public function salvar(Request $request) {
        $addNovaEspecialidade = Especialidade::where('especialidade', 'like', '%' . $request->input('especialidade') . '%')->first();       
        if (empty($addNovaEspecialidade)) {
            $addNovaEspecialidade = Especialidade::create([
                'especialidade' => $request->input('especialidade'), 
            ]);
        }
        $especialidades = Especialidade::get();

        \Session::flash('mensagem_sucesso', 'Especialidade incluída com sucesso!');

        return view('especialidades.listaespecialidades', compact('especialidades'));
    }

    public function editar($id) {
        $especialidade = Especialidade::find($id);

        if(!$especialidade){
            return redirect()->route('especialidades');
        }

        return view('especialidades.editarespecialidades', compact('especialidade'));
    }

    public function atualizar(Request $request, $id) {
        $update = [
            'especialidade' =>  $request->input('especialidade'),
        ];
        
        Especialidade::find($id)->update($update); 

        \Session::flash('mensagem_sucesso', 'Especialidade alterada com sucesso!');

        return redirect()->route('especialidades');
    }

    public function excluir($id) {
        $especialidade =  Especialidade::find($id);

        if($especialidade) {
            $existe = Guerreiro::existePorEspecialidade($especialidade->id);
            if ($existe) {
                $data['especialidade'] = $especialidade;
                return view('especialidades/excluirespecialidades', $data);
            }

            $result = $especialidade->delete();
        }

        return redirect()->route('especialidades');
    }

    public function confirmarexcluir($id) {
        $especialidade =  Especialidade::find($id);
        if ($especialidade) {
            Guerreiro::excluirPorEspecialidade($especialidade->id);
            $especialidade->delete();
        }

        return redirect()->route('especialidades');
    }
}
