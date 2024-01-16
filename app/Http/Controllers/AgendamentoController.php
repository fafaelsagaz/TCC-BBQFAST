<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use App\Models\EventoUserRelationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AgendamentoController extends Controller
{
    public function Agendamento(){
          // Obtenha os IDs dos eventos aceitos pelo usuário
          $user = Auth::user();
          $eventosAceitos = EventoUserRelationship::where('user_id', $user->id)
              ->where('NM_STATUS', 'aceito')
              ->pluck('CD_PEDIDO')
              ->toArray();
  
          // Obtenha os detalhes dos eventos aceitos
          $eventos = Evento::whereIn('CD_PEDIDO', $eventosAceitos)
              ->get();
  
          return view('Agendamento', ['eventos' => $eventos]);
    }
}
