<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear el permiso si no existe
        Permission::firstOrCreate(['name' => 'view admin panel']);

        // Crear el usuario si no existe
        $user = User::firstOrCreate(
            ['id' => 3],
            [
                'name' => 'admin1',
                'email' => 'admin1@admin.com',
                'password' => bcrypt('password')
            ]
        );
        
        $user->givePermissionTo('view admin panel');
    }
} 