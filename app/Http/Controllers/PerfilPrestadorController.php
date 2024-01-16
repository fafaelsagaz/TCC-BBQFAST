<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use App\Models\User;
use App\Models\Prestadore;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PerfilPrestadorController extends Controller
{
    public function indexp()
    {
        $user = auth()->user();
        $prestadores = $user->prestadore;

        //$prestadores = Prestadore::get();
        //$specialties = Specialty::all();
        //$services = Service::all();


        //$prestador = Prestador::all();
        //dd($prestador);
        return view('perfilp.Index', [
            'prestadores' => $prestadores,
            //'specialties'=>$specialties,
            //'services'=>$services,
        ]);
    }

    public function createp()
    {
        $user = auth()->user();
        $prestadores = $user->prestadore;

        $specialties = Specialty::all();
        $services = Service::all();

        if ($user->info_incluida_prestador) {
            return redirect()->route('perfilp.indexp')->with('warn','Seu cadastro já está completo!');
        }

        /*if ($user->info_incluida_cliente) {
            return redirect()->route('perfilp.indexp');
        }else{*/
        return view('perfilp.Create', [
            'prestadores' => $prestadores,
            'specialties' => $specialties,
            'services' => $services,
        ]);
        //}


    }

    /*public function createp()
    {
        $user = auth()->user();
        $prestadores = $user->prestador;

        //$prestadores = Prestadore::get();
        $specialties = Specialty::all();
        $services = Service::all();


        //$prestador = Prestador::all();
        //dd($prestador);
        /*if ($user->info_incluida_prestador) {
            return redirect()->route('perfilp.indexp');
        }
        return view('perfilp.Create', [
            'prestadores' => $prestadores,
            'specialties'=>$specialties,
            'services'=>$services,
        ]);
    }*/

    public function showp($id)
    {

        $user = auth()->user();
        $prestador = Prestadore::find($id);

        if (!$prestador || $user->id != $prestador->CD_PRESTADOR) {
        return redirect()->route('perfilp.indexp')->with('warn', 'O cadastro precisar ser concluído!');
        }

        return view('perfilp.Show', compact('prestador'));
    }

    /*public function showc($id)
    {
        $user = auth()->user();

        if ($user->id !== $prestador = Prestadore::find($id)) {
            return redirect()->route('perfilprestador.index');
        }
        return view('PerfilPrestadorshow', compact('prestador'));
    }*/

    public function storep(Request $request)
    {

        //$specialty = Specialty::find(['CD_ESPECIALIZACAO'=>$request->CD_ESPECIALIZACAO]);
        //$service = Service::find(['CD_SERVICO' => $request->CD_SERVICO]);

        //$cdEspecializacao = $request->CD_ESPECIALIZACAO;
        //$specialty = Specialty::where('CD_ESPECIALIZACAO', $cdEspecializacao);

        //$cdServico = $request->CD_SERVICO;
        //$service = Specialty::where('CD_ESPECIALIZACAO', $cdServico);

        //$prestadore = new Prestadore();

        //$prestadore->CD_CNPJ = $request->CD_CNPJ;
        //$prestadore->FK_CD_SERVICO = $request->FK_CD_SERVICO;
        //$prestadore->KD_CD_ESPECIALIZACAO = $request->FK_CD_ESPECIALIZACAO;
        //$prestadore->DS_DESCRICAO = $request->DS_DESCRICAO;

        //$prestadore->specialty()->associate($specialty);
        //$prestadore->service()->associate($service);

        $validator = Validator::make($request->all(), [
            'CD_CNPJ' => 'required|min:11|max:14',
            'services_id' => 'required|exists:services,id',
            'specialties_id' => 'required|exists:specialties,id',
            'DS_DESCRICAO' => 'required|max:90',

        ],
        [
            'CD_CNPJ.required' => 'O campo CNPJ é obrigatório.',
            'CD_CNPJ.min' => 'O CNPJ deve ter no mínimo :min caracteres.',
            'CD_CNPJ.max' => 'O CNPJ deve ter no máximo :max caracteres.',
            'services_id.required' => 'O campo de serviço é obrigatório.',
            'services_id.exists' => 'O serviço selecionado não é válido.',
            'specialties_id.required' => 'O campo de especialidade é obrigatório.',
            'specialties_id.exists' => 'A especialidade selecionada não é válida.',
            'DS_DESCRICAO.required' => 'O campo de descrição é obrigatório.',
            'DS_DESCRICAO.max' => 'A descrição deve ter no máximo :max caracteres.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        /*if ($validator->fails()) {
            return redirect()
                ->route('perfilp.storep')
                ->withErrors($validator)
                ->withInput();
        }*/

        $prestador = new Prestadore([
            'CD_CNPJ' => $request->input('CD_CNPJ'),
            'services_id' => $request->input('services_id'),
            'specialties_id' => $request->input('specialties_id'),
            'DS_DESCRICAO' => $request->input('DS_DESCRICAO'),
        ]);


        $user = auth()->user();
        $prestador->CD_PRESTADOR = $user->id;
        User::where('id', $user->id)->update(['info_incluida_prestador' => true]);
        $prestador->save();

        return redirect()->route('perfilp.indexp')->withErrors($validator)->with('succ', 'Inclusão realizada com sucesso!');
    }

    public function editp($id)
    {
        $prestador = Prestadore::find($id);
        $user = User::find($id);
        //dd($prestador, $user);

        if (!empty($prestador && $user)) {
            return view('perfilp.Edit', compact('prestador', 'user'));
        } else {
            return redirect()->route('perfilp.indexp')->with('warn', 'O cadastro precisar ser concluído!');
        }
    }

    public function updatep(Request $request, $id)
    {
        //dd($request);

        $user = User::find($id);

        $imageName = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request->image->move(public_path('img/perfil'), $imageName);
        }

        $user->update([
            'image' => $imageName,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
        ]);

        $prestador = Prestadore::find($id);

        $prestador->update([
            'CD_CNPJ' => $request->input('CD_CNPJ'),
            'CD_SERVICO' => $request->input('CD_SERVICO'),
            'CD_ESPECIALIZACAO' => $request->input('CD_ESPECIALIZACAO'),
            'DS_DESCRICAO' => $request->input('DS_DESCRICAO'),
        ]);

        return redirect()->route('perfilp.indexp')->with('succ', 'Atualização realizada com sucesso!');
    }
}
