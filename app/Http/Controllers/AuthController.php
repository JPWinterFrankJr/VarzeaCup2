<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class AuthController extends Controller
{
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
