<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campeonato extends Model
{
    use HasFactory;

    // Atributos que podem ser atribuídos em massa
    protected $fillable = ['name', 'year'];

    // Relação: Um campeonato tem várias partidas
    public function matches()
    {
        return $this->hasMany(Campeonato::class);
    }
}
