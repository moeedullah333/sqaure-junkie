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
        Schema::create('winning_users', function (Blueprint $table) {
            $table->id();
            $table->integer('board_id');
            $table->integer('board_price');
            $table->json('percentage');
            $table->json('score');
            $table->json('winning_number');
            $table->json('right_way');
            $table->json('right_way_name');
            $table->json('wrong_way');
            $table->json('wrong_way_name');
            $table->json('plus2');
            $table->json('plus2_name');
            $table->json('minus2');
            $table->json('minus2_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winning_users');
    }
};
