<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entité;

class EntitéSeeder extends Seeder
{
    public function run(): void
    {
        Entité::create([
            'id_contrat' => 1,
            'id_adress' => 1,
            'nom' => 'Exemple SARL',
            'type' => 'Entreprise',
            'logo' => null, // Ou base64_encode(file_get_contents(...))
        ]);
    }
}

