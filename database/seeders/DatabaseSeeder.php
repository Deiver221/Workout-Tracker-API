<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ExerciseSeeder;
use Database\Seeders\MuscleGroupSeeder;
use Database\Seeders\WorkoutSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'testtest'
        ]);

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test2@example.com',
            'password' => 'testtest'
        ]);

        $this->call([
            CategorySeeder::class,
            MuscleGroupSeeder::class,
            ExerciseSeeder::class,
            WorkoutSeeder::class,
        ]);
    }
}
