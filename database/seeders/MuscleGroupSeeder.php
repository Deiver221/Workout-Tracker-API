<?php

namespace Database\Seeders;

use App\Models\MuscleGroup;
use Illuminate\Database\Seeder;

class MuscleGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $muscleGroups = [
            'Chest',
            'Back',
            'Legs',
            'Shoulders',
            'Biceps',
            'Triceps',
            'Forearms',
            'Core',
            'Full Body',
            'Glutes',
            'Calves',
            'Hamstrings',
            'Quads'
        ];

        foreach($muscleGroups as $muscleGroup)
        {
            MuscleGroup::create([
                'name' => $muscleGroup
            ]);
        }
    }
}
