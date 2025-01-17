<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Championship;
use App\Models\Matche;

class MatcheController extends Controller
{
    public function view_matche()
    {
        $users = User::all();
        $teams = Team::all();
        $championships  = Championship::all();
        $matches = Matche::all();

    
        return view('matche', compact('championships'))
                ->with('matches', $matches)
                ->with('championships', $championships)
                ->with('teams',$teams)
                ->with('users',$users);
                
    }

    public function updatematche(Request $request, $id)
    {
        $match = Matche::findOrFail($id);
        $match->home_team_score = $request->home_team_score;
        $match->away_team_score = $request->away_team_score;
        $match->save();

        return redirect()->back()->with('matche', 'Partida atualizada com sucesso!');
    }

    public function updatechampionship(Request $request, $id)
    {
        $champioship = Championship::findOrFail($id);
        $champioship->name = $request->name;
        $champioship->save();

        return redirect()->back()->with('champioship', 'Campeonato atualizado com sucesso!');
    }

    public function updateteam(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->name = $request->name;
        $team->save();

        return redirect()->back()->with('team', 'Time atualizado com sucesso!');
    }

    public function updateuser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->back()->with('user', 'Partida atualizada com sucesso!');
    }
   
    public function destroymatche(Request $request, $id)
    {
        $matche = Matche::findOrFail($id); // Verifica se a partida existe
        $matche->delete(); // Exclui a partida
    
        return redirect()->back()->with('destroy_matche', 'Partida deletada com sucesso!');
    }

    public function destroyteam(Request $request, $id)
    {
        $team = Team::findOrFail($id); // Verifica se a partida existe
        $team->delete(); // Exclui a partida
    
        return redirect()->back()->with('destroyteam', 'Time deletado com sucesso!');
    }

    public function destroychampionship(Request $request, $id)
    {
        $championship = Championship::findOrFail($id); // Verifica se a partida existe
        $championship->delete(); // Exclui a partida
    
        return redirect()->back()->with('destroychampionship', 'Campeonato deletado com sucesso!');
    }

    public function destroyuser(Request $request, $id)
    {
        $user = User::findOrFail($id); // Verifica se a partida existe
        $user->delete(); // Exclui a partida
    
        return redirect()->back()->with('destroyuser', 'Usuário deletado com sucesso!');
    }

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
        return view('matche', compact('matches', 'championships', 'teams','users'));
    }

}