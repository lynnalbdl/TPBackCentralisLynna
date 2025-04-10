<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('second_db')->rename('post_users', 'user_db2s');
    }

    public function down(): void
    {
        Schema::connection('second_db')->rename('user_db2s', 'post_users');
    }
};
