<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\User;
class AgendamentoClienteController extends Controller
{
    public function AgendamentoCliente(Evento $evento){

       
        $cliente = Auth::user();

        // Obtenha os IDs dos status "pendente" e "recusado"
        $cliente = Auth::user();

        // Obtenha os IDs dos status "pendente" e "recusado"
        $statusPendenteId = Evento::where('NM_STATUS', 'Pendente')->value('user_id');
        $statusRecusadoId = Evento::where('NM_STATUS', 'recusado')->value('user_id');

        // Busque todos os eventos com status "pendente" ou "recusado" relacionados ao cliente autenticado
        $eventos = Evento::where('user_id', $cliente->id)
            ->whereIn('NM_STATUS', ['Pendente', 'recusado'])
            ->get();

        return view('AgendamentoCliente', ['eventos' => $eventos]);
    
 
       

        
    }
    
 
   
}
