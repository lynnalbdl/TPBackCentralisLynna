<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contrat;

class ContratSeeder extends Seeder
{
    public function run(): void
    {
        Contrat::create([
            'id_lot' => 1,
            'id_entité' => 1,
            'binaire' => null, // ou file_get_contents(...) si tu veux insérer un PDF ou fichier
        ]);
    }
}

