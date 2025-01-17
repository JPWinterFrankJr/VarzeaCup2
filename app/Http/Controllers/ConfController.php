<?php

namespace App\Http\Controllers;
use App\Models\Matche;
use App\Models\Championship;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class ConfController extends Controller
{
    public function filter_controller(Request $request)
    {   
        $users=User::all();
        $teams=Team::all();
        // Captura o campeonato selecionado
        $championship_id = $request->input('selected_championship');
        
        // Verifique o valor de $championship_id

        // Filtra as partidas com base no campeonato selecionado
        $matches = Matche::when($championship_id, function ($query) use ($championship_id) {
            return $query->where('championships_id', $championship_id);
        })->get();

        // Verifique se a consulta retorna algum resultado

        // Passa as partidas filtradas para a view
        $championships = Championship::all(); // Certifique-se de passar os campeonatos disponíveis para o filtro
        return view('partidas', compact('matches', 'championships', 'teams','users'));
    }

}
