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
        Schema::table('pduas', function (Blueprint $table) {
            $table->integer('No')->after('user_id')->default('2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pduas', function (Blueprint $table) {
            $table->dropColumn('No');
        });
    }
};