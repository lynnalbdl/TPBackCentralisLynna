<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('second_db')->create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('type')->nullable(); // exemple : 'PDF', 'DOCX'...
            $table->string('chemin_fichier'); // stockage local ou URL
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('second_db')->dropIfExists('documents');
    }
};
