<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecuperacaodeSenhaController extends Controller
{
    public function recuperacaodeSenha(){
        return view('recuperacaodeSenha');
    }
}
