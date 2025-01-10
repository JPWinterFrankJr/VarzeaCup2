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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('championship_id')->constrained()->onDelete('cascade'); // Relaciona com campeonatos
            $table->foreignId('home_team_id')->constrained('teams')->onDelete('cascade'); // Time mandante
            $table->foreignId('away_team_id')->constrained('teams')->onDelete('cascade'); // Time visitante
            $table->integer('round'); // Rodada da partida
            $table->dateTime('scheduled_at'); // Data e hora da partida
            $table->integer('home_team_score')->nullable(); // Placar do time mandante
            $table->integer('away_team_score')->nullable(); // Placar do time visitante
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
