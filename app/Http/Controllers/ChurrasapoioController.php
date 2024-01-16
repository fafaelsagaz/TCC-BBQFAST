<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ChurrasapoioController extends Controller
{
    public function Churrasapoio(){
      


        $serviceIdDesejado = 2;

        // Obtém o ID do usuário autenticado (usuário atual)
        $userId = Auth::id();

        // Consulta para obter churrasqueiros com o services_id desejado, excluindo o usuário atual
        $churrasqueiros = User::whereHas('prestador', function ($query) use ($serviceIdDesejado) {
            $query->where('services_id', $serviceIdDesejado);
        })->where('id', '!=', $userId)->get();

        // Retorne a view com os churrasqueiros filtrados
        return view('Churrasqueiro', ['churrasqueiro' => $churrasqueiros]);

        
    }
}
