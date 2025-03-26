<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Création de permissions
        $permissions = [
            //'edit users', 'delete users', 'create users', 'view users',
            //'edit own profile', // Permission spécifique pour les actions sur le profil utilisateur
            'view own profile', // Permission pour voir son propre profil
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Création du rôle 'super admin' et assignation de toutes les permissions
        // $roleSuperAdmin = Role::create(['name' => 'super admin']);
        // $roleSuperAdmin->givePermissionTo(Permission::all());

        // // Création du rôle 'admin' et assignation des permissions (sauf 'delete users')
        // $roleAdmin = Role::create(['name' => 'admin']);
        // $roleAdmin->givePermissionTo(['edit articles', 'delete articles', 'publish articles', 'edit users', 'create users', 'view users']);

        // Création du rôle 'user' et assignation de la permission de gestion de son propre profil
        $roleUser = Role::create(['name' => 'onhold']);
        $roleUser->givePermissionTo(['view own profile']);
    }

}