<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo;

class TiposController extends Controller
{
    public function index(){
        $tipos = Tipo::get();

        return view('tipos.listatipos', compact('tipos'));
    }

    public function novo(){
        return view('tipos.formtipos');
    }

    public function salvar(Request $request){
        $addNovoTipoGurreiro = Tipo::where('tipo', 'like', '%' . $request->input('tipo') . '%')->first();
       
        if (empty($addNovoTipoGurreiro)) {
            $addNovoTipoGurreiro = Tipo::create([
                'tipo' => $request->input('tipo'), 
            ]);
        }

        $tipos = Tipo::get();
        
        return view('tipos.listatipos', compact('tipos'));
    }
}
