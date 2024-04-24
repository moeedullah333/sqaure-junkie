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
        Schema::create('game_board', function (Blueprint $table) {
            $table->id();
            $table->integer('board_id');
            $table->integer('price');
            $table->string('board_title');
            $table->json('q1x')->nullable();
            $table->json('q1y')->nullable();
            $table->json('q2x')->nullable();
            $table->json('q2y')->nullable();
            $table->json('q3x')->nullable();
            $table->json('q3y')->nullable();
            $table->json('q4x')->nullable();
            $table->json('q4y')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game');
    }
};
