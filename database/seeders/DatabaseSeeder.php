<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Crear roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Crear permisos
        $viewAdminPanel = Permission::create(['name' => 'view admin panel']);
        $editSpecialContent = Permission::create(['name' => 'edit special content']);

        // Asignar permisos a roles
        $adminRole->givePermissionTo($viewAdminPanel, $editSpecialContent);

        $user = User::find(1);
        $user->assignRole('admin');

        $this->call([
            CursosTableSeeder::class,
        ]);
    }
}
