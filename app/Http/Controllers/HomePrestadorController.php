<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePrestadorController extends Controller
{
    public function homePrestador(){
        return view('homePrestador');
    }
}
