<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // 🔐 Définir toutes les permissions disponibles dans le système
        $permissions = [
            'manage users',
            'view dashboard',
            'edit all',
            'view users',
            'assign tasks',
            'view own tasks',
            'update task status',
            'create ticket',
            'view own profile',
            'send message',
            'resolve ticket',
            'access system logs',
        ];

        // ✅ Créer les permissions
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName]);
        }

        // 🎭 Définir les rôles et leurs permissions
        $roles = [
            'admin' => [
                'manage users',
                'view dashboard',
                'edit all',
            ],
            'gestionnaire' => [
                'view users',
                'assign tasks',
                'view dashboard',
            ],
            'prestataire' => [
                'view own tasks',
                'update task status',
            ],
            'client' => [
                'create ticket',
                'view own profile',
                'send message',
            ],
            'technique' => [
                'resolve ticket',
                'access system logs',
            ],
            'onhold' => [
                'view own profile',
            ],
        ];

        // 🧩 Création des rôles et assignation des permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions); // ⚠️ Sync pour éviter les doublons
        }
    }
}
