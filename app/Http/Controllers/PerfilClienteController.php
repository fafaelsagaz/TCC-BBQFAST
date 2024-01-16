<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PerfilClienteController extends Controller
{
    public function indexc()
    {

        //$cliente = Cliente::all();
        //dd($cliente);

        $user = auth()->user();
        $clientes = $user->cliente;

        return view('perfilc.Index', ['clientes' => $clientes]);
    }

    public function createc()
    {
        $user = auth()->user();

        if ($user->info_incluida_cliente) {
            return redirect()->route('perfilc.indexc')->with('warn','Seu cadastro já está completo!');
        }

        $clientes = $user->cliente;

        return view('perfilc.Create', ['clientes' => $clientes]);
    }

    public function showc($id)
    {

        $user = auth()->user();
        $cliente = Cliente::find($id);

        if (!$cliente || $user->id != $cliente->CD_CLIENTE) {
        return redirect()->route('perfilc.indexc')->with('warn', 'O cadastro precisar ser concluído!');
        }

        return view('perfilc.Show', compact('cliente'));
    }

    /*public function showc($id)
    {

        $user = auth()->user();

        if ($user->id !== $cliente = Cliente::find($id)) {
            return redirect()->route('perfilc.indexc');
        }
        return view('perfilc.Show', compact('cliente'));
    }*/


    public function storec(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'DT_NASCIMENTO_CLIENTE' => 'required|date',
            'CD_CPF_CLIENTE' => 'required|min:11|max:11',

        ],
        [
            'DT_NASCIMENTO_CLIENTE.required' => 'A data de nascimento é obrigatório.',
            'DT_NASCIMENTO_CLIENTE.date' => 'A data de nascimento deve ser uma data válida.',
            'CD_CPF_CLIENTE.required' => 'O CPF é obrigatório.',
            'CD_CPF_CLIENTE.min' => 'O CPF deve ter :min caracteres.',
            'CD_CPF_CLIENTE.max' => 'O CPF deve ter no máximo :max caracteres.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $cliente = new Cliente([
            'DT_NASCIMENTO_CLIENTE' => $request ->input('DT_NASCIMENTO_CLIENTE'),
            'CD_CPF_CLIENTE' => $request ->input('CD_CPF_CLIENTE'),
        ]);
        
        $user = auth()->user();
        $cliente->CD_CLIENTE = $user->id;
        User::where('id', $user->id)->update(['info_incluida_cliente' => true]);
        $cliente->save();

        //return redirect()->view('PerfilCliente');
        return redirect()->route('perfilc.indexc')->withErrors($validator)->with('succ', 'Inclusão realizada com sucesso');
    }

    public function editc($id)
    {
        $cliente = Cliente::find($id);
        $user = User::find($id);
        //dd($cliente, $user);

        if (!empty($cliente && $user)) {
            return view('perfilc.Edit', compact('cliente', 'user'));
        } else {
            return redirect()->route('perfilc.indexc')->with('warn', 'O cadastro precisar ser concluído!');
        }
    }

    public function updatec(Request $request, $id)
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
            'image'=> $imageName,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
        ]);

        $cliente = Cliente::find($id);

        $cliente->update([
            'DT_NASCIMENTO_CLIENTE' => $request->input('DT_NASCIMENTO_CLIENTE'),
            'CD_CPF_CLIENTE' => $request->input('CD_CPF_CLIENTE'),
        ]);

        return redirect()->route('perfilc.indexc')->with('succ', 'Atualização realizada com sucesso!');
    }
}
