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
        Schema::create('corner_facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('corner_id')->constrained('corners')->onDelete('cascade');;
            $table->foreignId('facility_id')->constrained('facilities')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corner_facilities');
    }
};
