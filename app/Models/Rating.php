<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // Define o nome da tabela
    protected $table = 'Rating';

    // Permite atribuição em massa para essas colunas
    protected $fillable = [
        'team_id',           // ID do time
        'championships_id',   // ID do campeonato
        'points',            // Pontos acumulados
        'games_played',      // Jogos jogados
        'wins',              // Vitórias
        'draws',             // Empates
        'losses',            // Derrotas
        'goals_for',         // Gols marcados
        'goals_against',     // Gols sofridos
        'goal_difference',   // Saldo de gols
    ];

    // Relacionamento com o time
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    // Relacionamento com o campeonato
    public function championships()
    {
        return $this->belongsTo(Championship::class, 'championship_id');
    }
}
