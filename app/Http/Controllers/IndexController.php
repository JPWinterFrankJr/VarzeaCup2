<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Championship;
use App\Models\Matche;
use App\Http\Requests\AuthUserRequest;

class IndexController extends Controller
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
    
    public function logar(AuthUserRequest $request)
    {    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redireciona para o dashboard ou outra rota após o login
            return redirect()->intended('/')->with('msg', 'Usuário logado com sucesso');
        } else {
            return back()->withInput()->withErrors(['email' => 'E-mail ou senha incorreta']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('msg-logout','Usuario desconectado');
    }
 
}
