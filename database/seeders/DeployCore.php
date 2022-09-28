<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Gerador de Hashes
use Illuminate\Support\Facades\Hash;

// Permissões
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DeployCore extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criar o usuário raiz
        $root = User::create([
            'name'          => 'root',
            'email'         => 'root@core',
            'password'      => Hash::make('password'),
        ]);

        // Cria uma regra para administração do sistema
        Permission::create([
            'name'          => 'admin',
            'description'   => 'Permissão para acessar a área administrativa',
        ]);

        // Cria o perfil de administrador do sistema
        $admin = Role::create([
            'name'          => 'Administrador de sistema',
            'description'   => 'Perfil responsável pela administração da plataforma. Pode acessar áreas restritas',
        ]);

        // Associa as permissões ao perfil
        $admin->syncPermissions([
            'admin',
        ]);

        // Associa o perfil ao usuário
        $root->assignRole([$admin]);

    }
}
