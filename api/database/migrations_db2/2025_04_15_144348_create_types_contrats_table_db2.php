<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('second_db')->create('types_contrats', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->unique(); // Exemple : "Accord-cadre", "Marché subséquent"
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('second_db')->dropIfExists('types_contrats');
    }
};
