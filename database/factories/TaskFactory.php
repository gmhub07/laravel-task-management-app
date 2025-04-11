<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->sentence(),
            'description'=> fake()->realText(),
            'due_date'=> fake()->dateTimeBetween('now', '+1 year'),
            'status'=> fake()->randomElement(['pending','inprogress','completed']),
            'priority'=> fake()->randomElement(['low','medium','high']),
            'image_path'=> fake()->imageUrl(),
            'assigned_user_id' =>1, // set the user_id
            'created_by'=>1,
            'updated_by'=>1,
            'created_at'=>time(), // set the current time
            'updated_at'=>time()
        ];
    }
}
