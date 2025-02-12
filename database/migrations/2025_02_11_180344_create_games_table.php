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
            $table->string('Name');
            $table->string('Platform');
            $table->integer('Year')->nullable();
            $table->string('Genre');
            $table->string('Publisher');
            $table->float('NA_Sales');
            $table->float('EU_Sales');
            $table->float('JP_Sales');
            $table->float('Other_Sales');
            $table->float('Global_Sales');
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
