<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMatcheRequest;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\CreateChampionshiepRequest;

use App\Models\User;
use App\Models\Matche;
use App\Models\Team;
use App\Models\Championship;

use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;

class CreateController extends Controller
{

    public function create_user(CreateUserRequest $request)
    {

        $user = User::where('email', $request->email)->first();
        if ($user) {
            return redirect()->route('view_user')
                ->with('error', 'E-mail já cadastrado: Não foi possivel realizar o cadastro');
        } else {
            // Os valores dentro da request já estão validados nesse ponto
            User::create($request->all());
            return redirect()->route('view_user')->with('success', 'Usuario cadastrado com sucesso.');
        }
    }


    public function create_team(CreateTeamRequest $request)
    {
        $team = Team::where('name', $request->name)->first();
        if ($team) {
            return redirect()->route('view_create')
                ->with('error_team', 'Time já cadastrado: Tente cadastrar com outro nome');
        } else {
            // Os valores dentro da request já estão validados nesse ponto
            Team::create($request->all());
            return redirect()->route('view_create')->with('success_team', 'Time cadastrado com sucesso.');
        }
    }

    public function create_championshiep(CreateChampionshiepRequest $request)
    {
        $championship = Championship::where('name', $request->name)->first();
        if ($championship) {
            return redirect()->route('view_create')
                ->with('error_championshiep', 'Campeonato já cadastrado: Tente cadastrar com outro nome');
        } else {
            // Os valores dentro da request já estão validados nesse ponto
            Championship::create($request->all());
            return redirect()->route('view_create')
                ->with('success_championshiep', 'Campeonato cadastrado com sucesso.');
        }
    }


    public function create_matche(CreateMatcheRequest $request)
    {   
        // Verifica se os times já jogaram duas vezes no mesmo campeonato
        $existingMatches = Matche::where(function ($query) use ($request) {
            $query->where('home_team_id', $request->home_team_id)
                  ->where('away_team_id', $request->away_team_id)
                  ->where('championships_id', $request->championships_id); // Verifica pelo campeonato
        })->orWhere(function ($query) use ($request) {
            $query->where('home_team_id', $request->away_team_id)
                  ->where('away_team_id', $request->home_team_id)
                  ->where('championships_id', $request->championships_id); // Verifica pelo campeonato
        })->count();

        // Se já tiver 2 ou mais partidas, retorna um erro
        if ($existingMatches >= 2) {
            return redirect()->route('view_create')
                ->with('error_matche', 'Os times já jogaram duas vezes entre si neste campeonato. Não é possível cadastrar outra partida.');
        }
    
        // Cria a partida
        Matche::create($request->validated());
        return redirect()->route('view_create')
            ->with('success_matche', 'Cadastro da partida realizado com sucesso');
    }
}
