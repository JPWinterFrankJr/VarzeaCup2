<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario;

class ViewController extends Controller
{
    public function view_index()
    {
        return view('index');
    }

    public function view_cadastros()
    {
        return view('cadastros');
    }
    public function view_create_user()
    {
        return view('create_user');
    }

   
}
