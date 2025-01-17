<?php
namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Championship;
use Illuminate\Http\Request;
use App\Models\Matche;
use App\Models\User;

class DestroyController extends Controller
{
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
}