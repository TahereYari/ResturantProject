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
        Schema::table('product_baskets', function (Blueprint $table) {
            $table->unsignedBigInteger('resturant_id');
            $table->foreign('resturant_id')->references('id')->on('resturants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_baskets', function (Blueprint $table) {
            
        });
    }
};
