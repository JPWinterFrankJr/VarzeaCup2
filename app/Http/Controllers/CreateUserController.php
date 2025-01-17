<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;

class CreateUserController extends Controller
{
    
    public function view_create_user()
    {
        return view('create_user');
    }

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
   
}
