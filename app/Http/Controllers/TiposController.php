<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;
use App\Models\Guerreiro;

class TiposController extends Controller
{
    public function index() {
        $tipos = Tipo::get();

        return view('tipos.listatipos', compact('tipos'));
    }

    public function novo(){
        return view('tipos.formtipos');
    }

    public function salvar(Request $request) {
        $addNovoTipoGurreiro = Tipo::where('tipo', 'like', '%' . $request->input('tipo') . '%')->first();       
        if (empty($addNovoTipoGurreiro)) {
            $addNovoTipoGurreiro = Tipo::create([
                'tipo' => $request->input('tipo'), 
            ]);
        }
        $tipos = Tipo::get();

        \Session::flash('mensagem_sucesso', 'Tipo incluído com sucesso!');

        return view('tipos.listatipos', compact('tipos'));
    }

    public function editar($id) {
        $tipo = Tipo::find($id);

        if(!$tipo){
            return redirect()->route('tipos');
        }

        return view('tipos.editartipos', compact('tipo'));
    }

    public function atualizar(Request $request, $id) {
        $update = [
            'tipo' =>  $request->input('tipo'),
        ];
        
        Tipo::find($id)->update($update); 

        \Session::flash('mensagem_sucesso', 'Tipo atualizado com sucesso!');

        return redirect()->route('tipos');
    }

    public function excluir($id) {
        $tipo =  Tipo::find($id);

        if($tipo) {
            $exists = Guerreiro::existsByTipo($tipo->id);
            if ($exists) {
                $data['tipo'] = $tipo;
                return view('tipos/excluirtipos', $data);
            }
            $result = $tipo->delete();
        }

        return redirect()->route('tipos');
    }

    public function confirmarexcluir($id) {
        $tipo =  Tipo::find($id);

        if($tipo) {
            Guerreiro::excluirPorTipo($tipo->id);
            $result = $tipo->delete();
        }
        return redirect()->route('tipos');
    }
}
