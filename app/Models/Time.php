<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['name', 'city'];

    // Relação: Um time pode ter várias partidas
    public function matches()
    {
        return $this->hasMany(Time::class, 'home_team_id');
    }

    // Relação com o usuário (um time pertence a um usuário)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}