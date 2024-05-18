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
        Schema::create('psatus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('No')->default(1);
            $table->string('pengantin_l');
            $table->string('pengantin_p');
            $table->string('status')->default('edit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psatus');
    }
};
