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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->string('board_name');
            $table->date('voting_deadline');
            $table->date('game_date');
            $table->integer('status');
            $table->string('winning_board')->nullable();
            $table->json('ten')->default(0);
            $table->json('twenty')->default(0);
            $table->json('thirty')->default(0);
            $table->json('fourty')->default(0);
            $table->json('fifty')->default(0);
            $table->json('others')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
