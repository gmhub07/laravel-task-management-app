<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Zura',
            'email' => 'zura@example.com',
            'password'=> bcrypt('123.321A'),
            'email_verified_at'=> time()
        ]);

        //calling the project factory with tasks
        Project::factory()
        ->count(30) // creating 30 projects
        ->hasTasks(30) // where each project will have 30 tasks
        ->create();
    }
}
