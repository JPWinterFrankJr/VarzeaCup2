<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsuarioRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;



class CreateController extends Controller
{

    public function create_user(CreateUsuarioRequest $request)
    {

        $user = Usuario::where('email', $request->email)->first();
        if ($user) {
            return redirect()->route('view_user')
                ->with('error', 'E-mail já cadastrado: Não foi possivel realizar o cadastro');
        } else {
            // Os valores dentro da request já estão validados nesse ponto
            Usuario::create($request->all());
            return redirect()->route('view_user')->with('success', 'Usuario cadastrado com sucesso.');
        }
    }
}
