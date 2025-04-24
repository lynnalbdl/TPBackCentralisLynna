<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_lot')->constrained('lots')->onDelete('cascade');
            $table->foreignId('id_entité')->constrained('entités')->onDelete('cascade');
            $table->binary('binaire')->nullable();
            $table->timestamps();
        });
    }
    
    public function down(): void {
        Schema::dropIfExists('contrats');
    }
    
};
