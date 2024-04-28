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
        Schema::create('pduas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('pengantin_l');
            $table->string('pengantin_p');
            $table->date('tanggal')->nullable();
            $table->string('status')->default('edit');
            $table->string('ortu_l');
            $table->string('ortu_p');
            $table->string('akadResepsi');
            $table->string('linkGmaps');
            $table->string('alamat');
            $table->string('rekening');
            $table->timestamps();
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('pduas');
    }
};
