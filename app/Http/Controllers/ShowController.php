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
    public function view_index()
    {
        return view('index');
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
