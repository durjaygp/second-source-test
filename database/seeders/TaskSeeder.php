<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $i) {
            Task::create([
                'title' => $faker->sentence(4),
                'is_completed' => $faker->boolean(30), // 30% chance it's true
            ]);
        }
    }
}
