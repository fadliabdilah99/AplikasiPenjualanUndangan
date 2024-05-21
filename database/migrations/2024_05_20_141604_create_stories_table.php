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
        Schema::create('storis', function (Blueprint $table) {
            $table->id();
            $table->string('undangan_id');
            $table->integer('No');
            $table->string('foto');
            $table->string('title');
            $table->string('tanggal');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storis');
    }
};
