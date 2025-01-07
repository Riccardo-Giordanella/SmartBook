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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('day');
            $table->unsignedBigInteger('month');
            $table->unsignedBigInteger('year');
            $table->unsignedBigInteger('hour');
            $table->unsignedBigInteger('minute');
            $table->string('type');
            $table->string('service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Prima rimuoviamo la chiave esterna, poi la tabella
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Rimuove la chiave esterna
        });

        Schema::dropIfExists('appointments'); // Elimina la tabella appointments
    }
};
