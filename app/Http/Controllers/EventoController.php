<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Evento;
use App\Models\Service;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function create(Evento $evento)
    {

        $eventos = $evento->all();
        $services = Service::all();
        return view('Evento', compact('eventos', 'services'));
    }

    public function store(Request $request, Evento $evento,)
    {

        $user = Auth::user();




        // Preencha os dados do evento a partir do formulário
        $data = $request->all();
        $data['status'] = 'a';

        // Defina o ID do usuário autenticado no campo "FK_CD_PRESTADOR"
        $data['user_id'] = $user->id;



        // Verifica se todos os campos obrigatórios estão presentes
        $requiredFields = ['service_id', 'DS_EVENTO', 'DS_QUANTIDADE_EVENTO', 'DT_EVENTO', 'HR_EVENTO', 'HR_DURACAO', 'NM_ENDERECO_EVENTO', 'CD_TELEFONE_EVENTO'];

        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return redirect()->back()->withInput()->with('error', 'Preencha todos os campos.');
            }
        }

        // Verifica se a data do evento é válida
        if (!strtotime($data['DT_EVENTO'])) {
            return redirect()->back()->withInput()->with('error', 'Por favor, insira uma data de evento válida.');
        }

        $service = Service::find($data['service_id']);
        if (!$service) {
            return redirect()->back()->withInput()->with('error', 'ID de serviço inválido.');
        }

        // Define o valor de services_id como o mesmo do id na tabela services
        $data['services_id'] = $service->id;

        // Crie o evento no banco de dados
        $evento = $evento->create($data);

        return redirect('cliente')->with('msg', 'Evento criado com sucesso!!');
    }
}
