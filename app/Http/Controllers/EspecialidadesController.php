<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    public function index(){
        return view('especialidades.listaespecialidades');
    }

    public function novo(){
        return view('especialidades.formespecialidades');
    }
}
