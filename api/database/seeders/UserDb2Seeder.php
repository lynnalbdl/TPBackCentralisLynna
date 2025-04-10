<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\ModelsDb2\UserDb2;
use App\Hashing\Sha256Hasher;

class UserDb2Seeder extends Seeder
{
    public function run()
    {
        // On vérifie que le hasher est bien disponible
        $hasher = app(Sha256Hasher::class);

        if (!method_exists($hasher, 'make')) {
            throw new \Exception('Sha256Hasher non configuré correctement.');
        }

        $users = [
            [
                'name' => 'Acheteur Test',
                'email' => 'acheteur@test.com',
                'password' => $hasher->make('Acheteur123!'),
            ],
            [
                'name' => 'Candidat Test',
                'email' => 'candidat@test.com',
                'password' => $hasher->make('Candidat123!'),
            ],
            [
                'name' => 'Responsable Achat Test',
                'email' => 'responsable@test.com',
                'password' => $hasher->make('Responsable123!'),
            ],
            [
                'name' => 'Support Test',
                'email' => 'support@test.com',
                'password' => $hasher->make('Support123!'),
            ],
        ];

        foreach ($users as $userData) {
            UserDb2::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );
        }

        $this->command->info('UserDb2Seeder exécuté avec succès.');
    }
}
