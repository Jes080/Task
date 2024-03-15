<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i < 30; $i++){
            Task::create([
                'title' => $faker->sentence,
                'description' => $faker->sentence,
                'due' => $faker->date(),
                'priority' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Not Started', 'In Progress', 'Completed']),
            ]);
        }
    }
}
