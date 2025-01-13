<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['campeonato_id', 'home_team_id', 'away_team_id', 'round', 'scheduled_at', 'home_team_score', 'away_team_score'];

    // Relação com o Campeonato
    public function championship()
    {
        return $this->belongsTo(Partida::class);
    }

    // Relação com o time da casa
    public function homeTeam()
    {
        return $this->belongsTo(Partida::class, 'home_team_id');
    }

    // Relação com o time visitante
    public function awayTeam()
    {
        return $this->belongsTo(Partida::class, 'away_team_id');
    }
}
