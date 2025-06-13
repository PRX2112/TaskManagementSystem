<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        Permission::create(['name' => 'assign tasks']);
        Permission::create(['name' => 'manage projects']);
        Permission::create(['name' => 'view dashboard']);

        // Define roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Assign permissions to roles
        $adminRole->givePermissionTo(['assign tasks', 'manage projects', 'view dashboard']);
        $userRole->givePermissionTo(['view dashboard']);

        // Assign roles to users
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');

        $users = User::factory(5)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
        }
    }
}
