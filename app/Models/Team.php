<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['name'];

    // Relação: Um time pode ter várias partidas
    public function matches()
    {
        return $this->hasMany(Team::class, 'home_team_id');
    }

}