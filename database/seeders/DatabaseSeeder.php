<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
use App\Models\Project;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        $teams = Team::factory(3)->create();

        foreach ($teams as $team) {
            $team->users()->attach($users->random(rand(3, 6))->pluck('id'));
        }

        foreach ($teams as $team){
            $projects = Project::factory(rand(2, 3))->create([
                'team_id' => $team->id,
            ]);

            foreach($projects as $project){
                $members = $team->users;
            
                Task::factory(5)->create([
                    'project_id' => $project->id,
                    'user_id' => $members->random()->id, // Assign a random user from the team
                ]);
            }
        }
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
