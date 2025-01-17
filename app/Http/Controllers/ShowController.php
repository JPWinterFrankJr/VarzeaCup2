<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Championship;
use App\Models\Matche;

class ShowController extends Controller
{
    public function view_index(Request $request)
    {
        $posicao = 1;
        
        // Obtendo todos os campeonatos disponíveis
        $championships = Championship::all();
        
        // Pegando o championshipId da query string, se existir
        $championshipId = $request->get('championshipId', null);
    
        // Passa o championshipId para o método getClassification
        $classification = Matche::getClassification($championshipId);
    
        // Verifica se o campeonato foi selecionado
        $championship = $championshipId ? Championship::find($championshipId) : null;
    
        if ($championshipId && !$championship) {
            abort(404, 'Campeonato não encontrado.');
        }
    
        // Se o championshipId for fornecido, filtra as partidas daquele campeonato
        $matches = Matche::where('championships_id', $championshipId)->get();
    
        return view('index', compact('posicao', 'championship', 'matches', 'classification', 'championships', 'championshipId'));
    }
    
    public function view_create()
    {    
        $championships  = Championship::all();
        $teams = Team::all();
        return view('cadastros')
                    ->with('teams', $teams)
                    ->with('championships', $championships);
    }
    public function view_create_user()
    {
        return view('create_user');
    }
    public function view_matche()
    {
        $users = User::all();
        $teams = Team::all();
        $championships  = Championship::all();
        $matches = Matche::all();

    
        return view('partidas', compact('championships'))
                ->with('matches', $matches)
                ->with('championships', $championships)
                ->with('teams',$teams)
                ->with('users',$users);
                
    }
   
}
