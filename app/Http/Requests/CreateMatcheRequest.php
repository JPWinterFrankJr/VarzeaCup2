<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMatcheRequest extends FormRequest
{
    /**
     * Determine se o usuário está autorizado a fazer esta solicitação.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Altere para verificar permissões se necessário
    }

    /**
     * Obtenha as regras de validação que se aplicam à solicitação.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'championships_id' => 'required|exists:championships,id',
            'home_team_id' => 'required|exists:teams,id|different:away_team_id',  // Validando que os times são diferentes
            'away_team_id' => 'required|exists:teams,id',
            'round' => 'required|integer|min:1|max:2',
            'scheduled_at' => 'required|date|after:now',  // A data precisa ser após o momento atual
            'home_team_score' => 'nullable',  // O campo de pontuação da casa é opcional
            'away_team_score' => 'nullable',  // O campo de pontuação visitante é opcional
        ];
    }
    
    /**
     * Mensagens de erro personalizadas para validação.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'championships_id.required' => 'O campeonato é obrigatório.',
            'championships_id.exists' => 'O campeonato selecionado não é válido.',
            'home_team_id.required' => 'O time da casa é obrigatório.',
            'home_team_id.exists' => 'O time da casa selecionado não é válido.',
            'home_team_id.different' => 'O time da casa não pode ser o mesmo que o time visitante.',
            'away_team_id.required' => 'O time visitante é obrigatório.',
            'away_team_id.exists' => 'O time visitante selecionado não é válido.',
            'round.required' => 'A rodada é obrigatória.',
            'round.integer' => 'A rodada deve ser um número inteiro.',
            'round.min' => 'A rodada deve ser pelo menos 1.',
            'scheduled_at.required' => 'A data e hora da partida são obrigatórias.',
            'scheduled_at.date' => 'A data e hora fornecidas não são válidas.',
            'scheduled_at.after' => 'A data e hora da partida devem estar no futuro.',
            'home_team_score.integer' => 'O placar do time da casa deve ser um número inteiro.',
            'home_team_score.min' => 'O placar do time da casa não pode ser negativo.',
            'away_team_score.integer' => 'O placar do time visitante deve ser um número inteiro.',
            'away_team_score.min' => 'O placar do time visitante não pode ser negativo.',
        ];
    }
}
