<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Evento;
use App\Models\EventoUserRelationship;
use App\Models\Prestadore;

class DashBoardController extends Controller
{
    public function dashBoard()
    {
        // Obtém o ID do usuário logado
        $user = Auth::user();

        // Total de Pedidos Aceitos
        $totalPedidosAceitos = EventoUserRelationship::where('user_id', $user->id)
            ->where('NM_STATUS', 'LIKE', 'aceito') // Verifica se NM_STATUS contém 'aceito'
            ->count();

        // Total de Pedidos Recusados
        $totalPedidosRecusados = EventoUserRelationship::where('user_id', $user->id)
            ->where('NM_STATUS', 'LIKE', 'recusado') // Verifica se NM_STATUS contém 'recusado'
            ->count();

        // Total de Pedidos Recebidos
        $totalPedidosRecebidos = EventoUserRelationship::where('user_id', $user->id)
            ->count();

        // Último agendamento realizado
        $ultimoAgendamento = EventoUserRelationship::where('user_id', $user->id)
    ->where('NM_STATUS', 'LIKE', 'aceito') // Verifica se NM_STATUS contém 'aceito'
    ->orderBy('created_at', 'desc')
    ->first();

       $plano = Prestadore::where('CD_PRESTADOR', $user->id)->first();

       

        return view('DashBoard', compact('totalPedidosAceitos', 'totalPedidosRecusados', 'totalPedidosRecebidos', 'ultimoAgendamento', 'plano'));

    }
}
