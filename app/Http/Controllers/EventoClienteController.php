<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Avaliar;
use App\Models\Evento;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\Log;
class EventoClienteController extends Controller
{
    public function index(){

        $avaliar = Avaliacao::all();
        $cliente = Auth::user();

        // Busque todos os eventos com status "aceito" relacionados ao cliente autenticado
        $eventos = Evento::where('user_id', $cliente->id)
            ->where('NM_STATUS', 'aceito')
            ->get();

            
        return view('EventoCliente', ['eventos' => $eventos, 'avaliar' => $avaliar] );
    }

    public function create(Avaliacao $avaliacao){

        $avaliar = Avaliacao::all();
        $cliente = Auth::user();

        // Busque todos os eventos com status "aceito" relacionados ao cliente autenticado
        $eventos = Evento::where('user_id', $cliente->id)
            ->where('NM_STATUS', 'aceito')
            ->get();

            
        return view('EventoCliente', ['eventos' => $eventos, 'avaliar' => $avaliar] );

    }
    

    
    public function store(Request $request)
    {
        // Log para depuração
        Log::info('Entrou no método store');
        Log::info('Dados do formulário:', ['form_data' => $request->all()]);
        Log::info('CD_PRESTADOR:', ['cd_prestador' => $request->input('cd_prestador')]);
        Log::info('Comentário:', ['comentario' => $request->input('comentario')]);
        
        $user = Auth::user();
        
        $request->validate([
            'comentario' => 'required|string|max:100',
            'cd_prestador' => 'required|exists:prestadores,CD_PRESTADOR',
        ]);
        
        // Inicializa a variável $avaliacao
        $avaliacao = new Avaliacao();
        $avaliacao->CD_PRESTADOR = $request->input('cd_prestador');
        $avaliacao->user_id = $user->id;
        $avaliacao->comentario = $request->input('comentario');
        
        // Log para depuração
        Log::info('Antes de salvar a avaliação');
        
        try {
            $saved = $avaliacao->save();
        
            // Log para depuração
            Log::info('Avaliação salva com sucesso?', ['saved' => $saved]);
        } catch (\Exception $e) {
            // Log para depuração
            Log::error('Erro ao salvar a avaliação', ['error' => $e->getMessage()]);
            // Se houver um erro, você pode querer redirecionar com uma mensagem de erro
            return redirect()->back()->with('error', 'Erro ao salvar a avaliação.');
        }
        
        // Redirecione ou faça algo após salvar a avaliação
        return redirect()->back()->with('success', 'Avaliação salva com sucesso.');
    }
}