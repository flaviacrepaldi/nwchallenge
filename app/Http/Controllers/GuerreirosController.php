<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guerreiro;
use App\Models\Tipo;
use App\Models\Especialidade;
use Validator;

class GuerreirosController extends Controller
{
    private $path = 'imagens/guerreiros';

    public function index() {
        $guerreiros = Guerreiro::get();

        return view('guerreiros.listaguerreiros',  compact('guerreiros'));
    }

    public function novo(){
        $guerreiros = Guerreiro::get();
        $tipos = Tipo::get();
        $especialidades = Especialidade::get();

        return view('guerreiros.formguerreiros' , compact('guerreiros', 'tipos', 'especialidades'));
    }

    public function salvar(Request $request) {
        if (!empty($request->file('imagem'))) {
            $caminhoImagemGuerreiro = time() . '.' 
            . $request->file('imagem')->getClientOriginalExtension();
            
            $request->file('imagem')->move($this->path, $caminhoImagemGuerreiro);
        }

        $novoGuerreiro = Guerreiro::create([
            'nome' => $request->input('nome'),
            'id_tipo'=> $request->input('tipo'),
            'vida'=> $request->input('vida'),
            'defesa'=> $request->input('defesa'),
            'dano'=> $request->input('dano'),
            'velocidade_ataque' => $request->input('velocidadeAtaque'),
            'velocidade_movimento' => $request->input('velocidadeMovimento'),
            'imagem_guerreiro' => $caminhoImagemGuerreiro
        ]);

        $novoGuerreiro->especialidades()->sync($request->input('especialidades'));
    
        \Session::flash('mensagem_sucesso', 'Guerreiro incluído com sucesso!');

        return redirect()->route('guerreiros');
    }

    public function editar($id) {
        $guerreiro = Guerreiro::find($id);

        if(!$guerreiro){
            return redirect()->route('guerreiros');
        }

        return view('guerreiros.editarguerreiros', compact('guerreiro'));
    }

    public function atualizar(Request $request, $id) {
        $update = [
            'guerreiro' =>  $request->input('guerreiro'),
        ];
        
        Guerreiro::find($id)->update($update); 

        \Session::flash('mensagem_sucesso', 'Guerreiro alterado com sucesso!');

        return redirect()->route('guerreiros');
    }

    public function excluir($id) {
        $guerreiro =  Guerreiro::find($id);

        if($guerreiro){
            $result = $guerreiro->delete();
        }

        return redirect()->route('guerreiros');
    }
}
