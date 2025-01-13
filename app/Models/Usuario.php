<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    // Defina o nome da tabela explicitamente
    protected $table = 'usuarios'; // Nome da tabela no banco de dados

    // Campos que podem ser preenchidos em massa
    protected $fillable = ['name', 'email', 'password'];

    // Campos que devem ser ocultados para serialização
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Campos que precisam ser convertidos para tipos nativos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}