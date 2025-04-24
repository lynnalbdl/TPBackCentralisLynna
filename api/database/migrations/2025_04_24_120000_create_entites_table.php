<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('entités', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_contrat')->nullable()->constrained('contrats')->onDelete('set null');
            $table->foreignId('id_adress')->constrained('adresses')->onDelete('cascade');
            $table->string('nom');
            $table->string('type');
            $table->binary('logo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('entités');
    }
};

