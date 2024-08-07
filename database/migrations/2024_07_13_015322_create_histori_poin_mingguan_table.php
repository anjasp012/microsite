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
        Schema::create('histori_poin_mingguan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('periode_id');
            $table->foreignId('post_id');
            $table->foreignId('user_id');
            $table->integer('point');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_poin_mingguan');
    }
};
