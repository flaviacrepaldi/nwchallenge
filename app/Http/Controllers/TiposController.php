<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiposController extends Controller
{
    public function index(){
        return view('tipos.listatipos');
    }

    public function novo(){
        return view('tipos.formtipos');
    }
}
