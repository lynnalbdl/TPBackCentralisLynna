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
        Schema::create('role_user_db2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_db2_id')->constrained('user_db2s')->onDelete('cascade');
            $table->foreignId('role_db2_id')->constrained('roles_db2')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user_db2');
    }
};
