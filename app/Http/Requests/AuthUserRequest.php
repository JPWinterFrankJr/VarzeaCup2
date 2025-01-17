<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;  // Deve ser true para permitir a requisição
    }

    public function rules()
    {
        return [
        'email' => 'required|string|email',
        'password' => 'required|string'
        ];
    }
}