<?php
namespace App\Http\Controllers;

use App\Models\Championship;
use Illuminate\Http\Request;
use App\Models\Matche;
use App\Models\User;
use App\Models\Team;

class UpdateController extends Controller
{
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
}