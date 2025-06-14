<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Team;
use App\Models\Project;
use App\Models\Task;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Clear cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'assign tasks',
            'manage projects',
            'view dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        $adminRole->syncPermissions($permissions);
        $userRole->syncPermissions(['view dashboard']);

        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);

        // Create regular users and assign roles
        $users = User::factory(10)->create();
        $users->each(fn($user) => $user->assignRole($userRole));

        // Create teams and associate users
        $teams = Team::factory(3)->create();
        foreach ($teams as $team) {
            $teamUsers = $users->random(rand(3, 6));
            $team->users()->attach($teamUsers->pluck('id'));

            // Create projects for each team
            $projects = Project::factory(rand(2, 3))->create([
                'team_id' => $team->id,
            ]);

            foreach ($projects as $project) {
                // Assign 5 tasks to random team members
                Task::factory(5)->create([
                    'project_id' => $project->id,
                    'user_id' => $teamUsers->random()->id,
                ]);
            }
        }
    }
}
