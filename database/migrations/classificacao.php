<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('championship_id')->constrained()->onDelete('cascade'); // Relaciona com campeonatos
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade'); // Time relacionado
            $table->integer('played')->default(0); // Partidas jogadas
            $table->integer('won')->default(0); // Vitórias
            $table->integer('drawn')->default(0); // Empates
            $table->integer('lost')->default(0); // Derrotas
            $table->integer('points')->default(0); // Pontuação
            $table->timestamps(); // Criação e atualização do registro
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standings');
    }
};
