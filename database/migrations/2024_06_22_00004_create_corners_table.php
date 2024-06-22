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
            $table->foreignId('categorie_id')->constrained('categories');
            $table->string('name');
            $table->string('location');
            $table->string('fasility_id');
            $table->foreignId('img_id')->constrained('images');
            $table->string('detail');
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