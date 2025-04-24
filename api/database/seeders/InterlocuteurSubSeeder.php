<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InterlocuteurSub;

class InterlocuteurSubSeeder extends Seeder
{
    public function run(): void
    {
        InterlocuteurSub::create([
            'id_user' => 1,
            'id_entité' => 1,
            'téléphone' => '0123456789',
            'e_mail_contact' => 'contact@example.com',
        ]);
    }
}

