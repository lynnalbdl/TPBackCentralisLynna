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
        Schema::connection('second_db')->create('marche_subs', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->date('date_publication');
            $table->date('date_limite');
            $table->foreignId('acheteur_id')->constrained('user_db2s')->onDelete('cascade');
            $table->foreignId('type_contrat_id')->constrained('types_contrats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('second_db')->dropIfExists('marche_subs');
    }
};
