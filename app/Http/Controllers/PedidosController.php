<?php


namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agendamento;
use App\Models\EventoUserRelationship;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\Prestadore;


class PedidosController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Busque o prestador associado ao cliente
        $prestadore = Prestadore::where('CD_PRESTADOR', $user->id)->first();

        if ($prestadore) {
            // Busque todos os eventos associados ao services_id do prestador
            $eventos = Evento::where('user_id', '!=', $user->id)
                ->whereDoesntHave('usuariosRecusaram', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('NM_STATUS', '!=', 'aceito') // Exclua os eventos com status 'aceito'
                ->where('services_id', $prestadore->services_id) // Ajuste para usar services_id do prestador
                ->get();

            return view('Pedidos', ['eventos' => $eventos]);
        } else {
            // Trate o caso em que não há prestador associado ao cliente
            return view('Pedidos', ['eventos' => []])->with('message', 'Você não possui um prestador associado.');
        }
    }

    public function recusarPedidoEListarEventos($pedidoId)
    {
        $cliente = Auth::user();
        $evento = Evento::find($pedidoId);

        if ($evento) {
            // Verifique se o evento já foi recusado por este usuário
            $recusa = EventoUserRelationship::where('CD_PEDIDO', $evento->CD_PEDIDO)
                ->where('user_id', $cliente->id)
                ->first();

            if (!$recusa) {
                $recusa = new EventoUserRelationship();
                $recusa->CD_PEDIDO = $evento->CD_PEDIDO;
                $recusa->user_id = $cliente->id;
                $recusa->NM_STATUS = 'recusado'; // Defina o status como "recusado" apenas no relacionamento
                $recusa->save();
            }
        }

        // Recupere a lista de eventos que o cliente não recusou
        $eventos = Evento::where('user_id', $cliente->id)
            ->whereDoesntHave('usuariosRecusaram', function ($query) use ($cliente) {
                $query->where('user_id', $cliente->id);
            })
            ->get();

        return view('pedidos', ['eventos' => $eventos])->with('message', 'Pedido recusado com sucesso');
    }

    public function aceitarPedido($pedidoId)
    {
        $cliente = Auth::user();
        $evento = Evento::find($pedidoId);

        if ($evento) {
            // Atualize o status do evento
            $evento->update(['NM_STATUS' => 'aceito']);

            // Registre o usuário que aceitou na tabela user_id_aceitou
            $relacionamento = new EventoUserRelationship();
            $relacionamento->CD_PEDIDO = $evento->CD_PEDIDO;
            $relacionamento->user_id = $cliente->id;
            $relacionamento->NM_STATUS = 'aceito';
            $relacionamento->save();
        }

        return redirect()->route('pedidos')->with('msg', 'Pedido aceito com sucesso');
    }
}
