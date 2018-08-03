<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuerreirosController extends Controller
{
    public function index(){
        return view('guerreiros.lista');
    }

    public function novo(){
        return view('guerreiros.form');
    }
}
