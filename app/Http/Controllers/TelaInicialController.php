<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelaInicialController extends Controller
{
    public function TelaInicial(){
        return view('TelaInicial');
    }
}
