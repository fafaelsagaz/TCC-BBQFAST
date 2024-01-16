<?php

namespace App\Http\Controllers;
use App\Models\Avaliacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AvalieComentController extends Controller
{
    public function AvalieComent()
    {
        // Obtenha o ID do usuário autenticado
        $userId = Auth::id();

        // Obtenha todas as avaliações direcionadas ao usuário autenticado
        $avaliacoes = Avaliacao::where('CD_PRESTADOR', $userId)->get();

        // Crie uma coleção para armazenar os detalhes da avaliação
        $detalhesAvaliacoes = collect();
        



        // Itere sobre cada avaliação para obter detalhes adicionais
        foreach ($avaliacoes as $avaliacao) {
            $user = User::find($avaliacao->user_id);

            $detalhes = [
                'image' => User::find($avaliacao->user_id)->image,
                'nome_avaliador' => User::find($avaliacao->user_id)->name,
                'comentario' => $avaliacao->comentario,
                'data' => $avaliacao->created_at->format('d/m/Y'),
                'imagem_usuario' => $user ? $user->image : null,
            ];

            $detalhesAvaliacoes->push($detalhes);
        }

        return view('AvalieComent', ['detalhesAvaliacoes' => $detalhesAvaliacoes]);
    }
}
