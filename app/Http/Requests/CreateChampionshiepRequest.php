<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CreateChampionshiepRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     */
    public function authorize(): bool
    {
        return true; // Retorne true se todos os usuários puderem usar esta request.
    }

    /**
     * Regras de validação para a request.
     */
    public function rules(): array
    {
        return [
            'name'=> 'string',
            'year'=> 'int'

        ];
    }

    /**
     * Mensagens personalizadas para as validações.
     
   * public function messages(): array
   *{
   *     return [
   *         'email.unique' => 'Este E-mail já foi cadastrado.',
    *    ];
   * } */
}