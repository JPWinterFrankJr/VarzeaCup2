<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario;


class AuthController extends Controller
{
    public function logar(Request $request)
    {    
        // Tente autenticar o usuário
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('index')
            ->with('msg','Usuario logado com sucesso'); 
        } else {

            return back()->withInput()
            ->withErrors(['email' => 'Credenciais inválidas']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('index')->with('msg-logout','Usuario desconectado');
    }
}
