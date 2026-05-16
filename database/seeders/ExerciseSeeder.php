<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Exercise;
use App\Models\MuscleGroup;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $exercises = [
            ['name' => 'Bench Press', 'description' => 'Barbell bench press on a flat bench', 'category' => 'Strength', 'muscle_group' => 'Chest'],
            ['name' => 'Incline Bench Press', 'description' => 'Barbell bench press on an incline bench', 'category' => 'Strength', 'muscle_group' => 'Chest'],
            ['name' => 'Push Up', 'description' => 'Bodyweight chest exercise', 'category' => 'Strength', 'muscle_group' => 'Chest'],
            ['name' => 'Deadlift', 'description' => 'Conventional barbell deadlift', 'category' => 'Powerlifting', 'muscle_group' => 'Back'],
            ['name' => 'Pull Up', 'description' => 'Bodyweight pull up', 'category' => 'Strength', 'muscle_group' => 'Back'],
            ['name' => 'Barbell Row', 'description' => 'Bent over barbell row', 'category' => 'Strength', 'muscle_group' => 'Back'],
            ['name' => 'Squat', 'description' => 'Barbell back squat', 'category' => 'Powerlifting', 'muscle_group' => 'Legs'],
            ['name' => 'Leg Press', 'description' => 'Machine leg press', 'category' => 'Strength', 'muscle_group' => 'Legs'],
            ['name' => 'Overhead Press', 'description' => 'Barbell overhead press', 'category' => 'Strength', 'muscle_group' => 'Shoulders'],
            ['name' => 'Lateral Raise', 'description' => 'Dumbbell lateral raise', 'category' => 'Strength', 'muscle_group' => 'Shoulders'],
            ['name' => 'Barbell Curl', 'description' => 'Standing barbell bicep curl', 'category' => 'Strength', 'muscle_group' => 'Biceps'],
            ['name' => 'Tricep Pushdown', 'description' => 'Cable tricep pushdown', 'category' => 'Strength', 'muscle_group' => 'Triceps'],
            ['name' => 'Running', 'description' => 'Outdoor running at moderate pace', 'category' => 'Cardio', 'muscle_group' => 'Full Body'],
            ['name' => 'Jump Rope', 'description' => 'High intensity jump rope', 'category' => 'HIIT', 'muscle_group' => 'Full Body'],
            ['name' => 'Cat-Cow Stretch', 'description' => 'Spine mobility exercise', 'category' => 'Mobility', 'muscle_group' => 'Core'],
            ['name' => 'Hamstring Stretch', 'description' => 'Seated hamstring stretch', 'category' => 'Flexibility', 'muscle_group' => 'Hamstrings'],
        ];

        foreach ($exercises as $exercise) {
            $category = Category::where('name', $exercise['category'])->first();
            $muscleGroup = MuscleGroup::where('name', $exercise['muscle_group'])->first();

            Exercise::create([
                'name' => $exercise['name'],
                'description' => $exercise['description'],
                'category_id' => $category->id,
                'muscle_group_id' => $muscleGroup->id,
            ]);
        }
    }
}
