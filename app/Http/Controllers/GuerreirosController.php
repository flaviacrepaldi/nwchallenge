<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuerreirosController extends Controller
{
    public function index(){
        return view('guerreiros.listaguerreiros');
    }

    public function novo(){
        return view('guerreiros.formguerreiros');
    }
}
