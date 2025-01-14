<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['id','name'];

    // Relação: Um time pode ter várias partidas
    public function matches()
    {
        return $this->hasMany(Time::class, 'home_team_id');
    }

}