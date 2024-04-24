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
        Schema::create('square_buy', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('board_id');
            $table->integer('price');
            $table->integer('q1x');
            $table->integer('q1y');
            $table->integer('q2x');
            $table->integer('q2y');
            $table->integer('q3x');
            $table->integer('q3y');
            $table->integer('q4x');
            $table->integer('q4y');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('square_buy');
    }
};
