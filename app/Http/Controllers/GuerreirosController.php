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
        $guerreiros = Guerreiro::all();
        return view('guerreiros.listaguerreiros',  compact('guerreiros'));
    }

    public function novo(){
        $guerreiros = Guerreiro::get();
        $tipos = Tipo::get();
        $especialidades = Especialidade::get();

        return view('guerreiros.formguerreiros' , compact('guerreiros', 'tipos', 'especialidades'));
    }

    public function salvar(Request $request) {
        $caminhoImagemGuerreiro = '';
        if (!empty($request->file('imagem'))) {
            $caminhoImagemGuerreiro = time() . '.' 
            . $request->file('imagem')->getClientOriginalExtension();

            $request->file('imagem')->move($this->path, $caminhoImagemGuerreiro);
        }

        if (!empty($request->input('id'))) {
            $guerreiro = Guerreiro::find($request->input('id'));
            
            $guerreiro->id = $request->input('id');
            $guerreiro->nome = $request->input('nome');
            $guerreiro->id_tipo = $request->input('tipo');
            $guerreiro->vida= $request->input('vida');
            $guerreiro->defesa = $request->input('defesa');
            $guerreiro->dano = $request->input('dano');
            $guerreiro->velocidade_ataque = $request->input('velocidadeAtaque');
            $guerreiro->velocidade_movimento = $request->input('velocidadeMovimento');
            $guerreiro->imagem_guerreiro = empty($caminhoImagemGuerreiro) ? $guerreiro->imagem_guerreiro : $caminhoImagemGuerreiro;
            $guerreiro->save();
            $guerreiro->especialidades()->sync($request->input('especialidade'));
        } else {
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
            $novoGuerreiro->especialidades()->sync($request->input('especialidade'));
        }

        \Session::flash('mensagem_sucesso', 'Guerreiro incluído com sucesso!');

        return redirect()->route('guerreiros');
    }

    public function editar($id) {
        $guerreiro = Guerreiro::find($id);

        if(!$guerreiro) {
            \Session::flash('mensagem_alerta', 'Que pena, não encontrei esse guerreiro. =(');
            return redirect()->route('guerreiros');
        }

        $tipos = Tipo::get();
        $especialidades = Especialidade::get();

        $especialidades_especialidades = $guerreiro->consultaEspecialidades($id);
        if (!empty($especialidades_especialidades)) {
            $ids = array();
            foreach($especialidades_especialidades as $item) {
                $ids[$item->especialidade_id] = $item->especialidade_id;
            }
        }
        $guerreiro->especialidades = $ids;
        
        $data['guerreiro'] = $guerreiro;
        $data['tipos'] = $tipos;
        $data['especialidades'] = $especialidades;
        return view('guerreiros.formguerreiros', $data);
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

        $data['guerreiro'] = $guerreiro;
        if($guerreiro){
            return view('guerreiros/excluirguerreiros', $data);
        }

        \Session::flash('mensagem_sucesso', 'Não encontrei esse guerreiro, sorry!');

        return redirect()->route('guerreiros');
    }

    public function confirmarexcluir($id) {
        $guerreiro =  Guerreiro::find($id);

        if($guerreiro) {
            Especialidade::excluirPorGuerreiro($id);
            $result = $guerreiro->delete();
        }
        return redirect()->route('guerreiros');
    }
}
