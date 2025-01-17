<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getClassification($championshipId = null)
{
    $query = self::select('teams.id as team_id', 'teams.name as team_name')
        ->selectRaw('SUM(CASE WHEN home_team_id = teams.id AND home_team_score > away_team_score THEN 3 
                               WHEN away_team_id = teams.id AND away_team_score > home_team_score THEN 3 
                               WHEN home_team_score = away_team_score THEN 1 ELSE 0 END) as points')
        ->selectRaw('COUNT(matches.id) as games_played')
        ->selectRaw('SUM(CASE WHEN home_team_id = teams.id AND home_team_score > away_team_score THEN 1 
                               WHEN away_team_id = teams.id AND away_team_score > home_team_score THEN 1 ELSE 0 END) as wins')
        ->selectRaw('SUM(CASE WHEN home_team_score = away_team_score THEN 1 ELSE 0 END) as draws')
        ->selectRaw('SUM(CASE WHEN home_team_id = teams.id AND home_team_score < away_team_score THEN 1 
                               WHEN away_team_id = teams.id AND away_team_score < home_team_score THEN 1 ELSE 0 END) as losses')
        ->join('teams', function($join) {
            $join->on('teams.id', '=', 'matches.home_team_id')
                 ->orOn('teams.id', '=', 'matches.away_team_id');
        })
        ->groupBy('teams.id', 'teams.name')
        ->orderBy('points', 'desc')
        ->orderBy('games_played', 'asc')
        ->orderBy('wins', 'desc')
        ->orderBy('draws', 'desc')
        ->orderBy('losses', 'desc');

    // Verificar se há um campeonato selecionado
    if ($championshipId) {
        $query->where('matches.championships_id', $championshipId);
    }

    return $query->get();
}

}

