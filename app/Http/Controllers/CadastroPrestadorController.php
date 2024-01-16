<?php 

namespace App\Http\Controllers;
use App\Models\CadastroPrestador;
use App\Models\OutraTabela;
use Illuminate\Http\Request;

class CadastroPrestadorController extends Controller
{
    public function CadastroPrestador(){
        return view('CadastroPrestador');
    }



    public function create(CadastroPrestador $servico){

        $servico = $servico->all();
       return view('CadastroPrestador', compact('servico'));




    }
    
   

    public function store(Request $request, CadastroPrestador $servico ,OutraTabela $outraTabela  ){
    
       $data = $request->all();
       $data['status'] = 'a';
    
       $servico = $servico->create($data);

       try {
    

        // Crie um novo registro na outra tabela
        $outraTabelaData = [
            'campo1' => $data['campo1'], // Substitua 'campo1' pelo nome do campo na outra tabela
            'campo2' => $data['campo2'], // Substitua 'campo2' pelo nome do campo na outra tabela
            // Adicione mais campos conforme necessário
        ];

        $outraTabela = $outraTabela->create($outraTabelaData);

        return redirect('cliente')->with('success', 'Evento criado com sucesso! Visite a aba agendamentos para visualizar');
    } catch (\Exception $e) {
        return back()->with('error', 'Erro ao inserir os dados.');
    }

    }

    
    
}



?>