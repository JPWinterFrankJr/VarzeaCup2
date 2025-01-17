<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['championships_id', 'home_team_id', 'away_team_id', 'round', 'scheduled_at', 'home_team_score', 'away_team_score'];

    public function championship()
    {
        return $this->belongsTo(Championship::class, 'championships_id');
    }

    // Relação com o time da casa
    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    // Relação com o time visitante
    public function awayTeam()
    {
     return $this->belongsTo(Team::class, 'away_team_id');
    }
}
