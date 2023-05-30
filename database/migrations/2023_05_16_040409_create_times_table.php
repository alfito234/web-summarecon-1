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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->float('Pintu');
            $table->float('RuangTamuDepan');
            $table->float('RuangMakan');
            $table->float('HalamanDepan');
            $table->float('Lantai2');
            $table->float('Balkon');
            $table->float('Kamar');
            $table->float('Toilet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};
