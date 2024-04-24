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
        Schema::table('winning_users', function (Blueprint $table) {
            $table->json('right_way_price')->after('right_way_name');
            $table->json('wrong_way_price')->after('wrong_way_name');
            $table->json('plus2_price')->after('plus2_name');
            $table->json('minus2_price')->after('minus2_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('winning_users', function (Blueprint $table) {
            $table->dropColumn(['right_way_price', 'wrong_way_price', 'plus2_price', 'minus2_price']);
        });
    }
};
