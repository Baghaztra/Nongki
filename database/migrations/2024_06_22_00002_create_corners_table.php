<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('corners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->text('detail');
            $table->time('jam_buka')->nullable();
            $table->time('jam_tutup')->nullable();
            $table->json('hari_buka')->nullable();
            $table->integer('harga_min')->default(0);
            $table->integer('harga_max')->default(0);;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corners');
    }
};