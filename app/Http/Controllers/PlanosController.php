<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;
use App\Models\User;
use App\Models\Prestadore;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlanosController extends Controller
{
    public function index()
    {

        $planos = Plano::all();
        $planoGrill = $planos->where('nome', 'Grill')->first();
        $planoBBQ = $planos->where('nome', 'BBQ')->first();


        return view("planos", [
            'planos' => $planos,
            'planoGrill' => $planoGrill,
            'planoBBQ' => $planoBBQ
        ]);
    }

    public function create($id)
    {
        $user = auth()->user();
        $planos = Plano::all();
        $planoGrill = $planos->where('nome', 'Grill')->first();
        $planoBBQ = $planos->where('nome', 'BBQ')->first();

        $prestadore = Prestadore::find($id);
        $user = User::find($id);

        if (!empty($prestadore && $user)) {
            return view("planos", [
                'planos' => $planos,
                'planoGrill' => $planoGrill,
                'planoBBQ' => $planoBBQ
            ]);
        } else {
            return redirect()->route('planos.index')->with('warn', 'Seu perfil precisar ser concluído!');
        }





    }

    public function store(Request $request){


        $request->validate([
            'planos_id' => 'required|exists:planos,id'
        ]);

        $user = auth()->user();

        $prestador = new Prestadore();
        $prestador->updateOrCreate(
            ['CD_PRESTADOR' => $user->id],
            [
                'planos_id' => $request->input('planos_id'),
            ]
        );

        /*$prestador = new Prestadore([
            'planos_id' => $request->input('planos_id'),
        ]);

        $prestador->CD_PRESTADOR = $user->id;
        $prestador->save();*/

        return redirect('prestador')->with('succ', 'Parabéns! Você já pode utilizar seu plano!');
    }
}
