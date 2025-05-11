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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tournament_id')->references('id')->on('tournaments');
            $table->foreignId('team_1')->references('id')->on('teams');
            $table->foreignId('team_2')->references('id')->on('teams');
            $table->unsignedInteger('team_1_score')->nullable();
            $table->unsignedInteger('team_2_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
