<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => hash('sha256', 'Admin123!'),
                'role' => 'admin',
            ],
            [
                'name' => 'Gestionnaire User',
                'email' => 'gestionnaire@example.com',
                'password' => hash('sha256', 'Gestion123!'),
                'role' => 'gestionnaire',
            ],
            [
                'name' => 'Prestataire User',
                'email' => 'prestataire@example.com',
                'password' => hash('sha256', 'Presta123!'),
                'role' => 'prestataire',
            ],
            [
                'name' => 'Client User',
                'email' => 'client@example.com',
                'password' => hash('sha256', 'Client123!'),
                'role' => 'client',
            ],
            [
                'name' => 'Technique User',
                'email' => 'technique@example.com',
                'password' => hash('sha256', 'Tech123!'),
                'role' => 'technique',
            ],
            [
                'name' => 'OnHold User',
                'email' => 'onhold@example.com',
                'password' => hash('sha256', 'Onhold123!'),
                'role' => 'onhold',
            ],
            [
                'name' => 'Test1',
                'email' => 'test1@example.com',
                'password' => hash('sha256', 'Test123!'),
                'role' => 'client',
            ],
            [
                'name' => 'Test2',
                'email' => 'test2@example.com',
                'password' => hash('sha256', 'Test123!'),
                'role' => 'client',
            ],
            [
                'name' => 'Test3',
                'email' => 'test3@example.com',
                'password' => hash('sha256', 'Test123!'),
                'role' => 'prestataire',
            ],
            [
                'name' => 'Test4',
                'email' => 'test4@example.com',
                'password' => hash('sha256', 'Test123!'),
                'role' => 'onhold',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => $userData['password'],
                ]
            );

            $user->assignRole($userData['role']);
        }
    }
}
