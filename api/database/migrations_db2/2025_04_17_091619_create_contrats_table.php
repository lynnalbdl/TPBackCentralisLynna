<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('second_db')->create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('numero_contrat')->unique();
            $table->string('objet')->nullable();
            $table->date('date_signature')->nullable();
            $table->unsignedBigInteger('lot_id');
            $table->unsignedBigInteger('entreprise_id');
            $table->timestamps();

            $table->foreign('lot_id')->references('id')->on('lots')->onDelete('cascade');
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('second_db')->dropIfExists('contrats');
    }
};
