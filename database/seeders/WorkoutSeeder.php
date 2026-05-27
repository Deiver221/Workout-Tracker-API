<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class WorkoutSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $workouts = [
            [
                'name'         => 'Push Day',
                'notes'        => 'Enfocado en empuje',
                'scheduled_at' => now(),
                'status'       => 'pending',
                'exercises'    => [
                    ['name' => 'Bench Press',      'sets' => 4, 'reps' => [10, 10, 8, 8],    'rir' => [2, 2, 1, 1], 'weight' => 80],
                    ['name' => 'Overhead Press',   'sets' => 3, 'reps' => [10, 10, 10],       'rir' => [2, 2, 2],    'weight' => 50],
                    ['name' => 'Tricep Pushdown',  'sets' => 3, 'reps' => [12, 12, 12],       'rir' => [1, 1, 1],    'weight' => 30],
                ],
            ],
            [
                'name'         => 'Pull Day',
                'notes'        => 'Enfocado en jalón',
                'scheduled_at' => now()->addDays(2),
                'status'       => 'pending',
                'exercises'    => [
                    ['name' => 'Pull Up',     'sets' => 4, 'reps' => [8, 8, 6, 6],     'rir' => [2, 2, 1, 1], 'weight' => 0],
                    ['name' => 'Barbell Row', 'sets' => 3, 'reps' => [10, 10, 10],      'rir' => [2, 2, 2],    'weight' => 70],
                    ['name' => 'Barbell Curl','sets' => 3, 'reps' => [12, 12, 12],      'rir' => [1, 1, 1],    'weight' => 30],
                ],
            ],
            [
                'name'         => 'Leg Day',
                'notes'        => 'Piernas completas',
                'scheduled_at' => now()->addDays(4),
                'status'       => 'pending',
                'exercises'    => [
                    ['name' => 'Squat',     'sets' => 4, 'reps' => [8, 8, 6, 6],   'rir' => [2, 2, 1, 1], 'weight' => 100],
                    ['name' => 'Leg Press', 'sets' => 3, 'reps' => [12, 12, 12],   'rir' => [2, 2, 2],    'weight' => 150],
                    ['name' => 'Deadlift',  'sets' => 3, 'reps' => [6, 6, 6],      'rir' => [2, 2, 2],    'weight' => 120],
                ],
            ],
        ];

        foreach ($workouts as $workoutData) {
            $workout = Workout::create([
                'user_id'      => $user->id,
                'name'         => $workoutData['name'],
                'notes'        => $workoutData['notes'],
                'scheduled_at' => $workoutData['scheduled_at'],
                'status'       => $workoutData['status'],
            ]);

            $exercises = [];
            foreach ($workoutData['exercises'] as $exerciseData) {
                $exercise = Exercise::where('name', $exerciseData['name'])->first();
                $exercises[$exercise->id] = [
                    'sets'   => $exerciseData['sets'],
                    'reps'   => json_encode($exerciseData['reps']),
                    'rir'    => json_encode($exerciseData['rir']),
                    'weight' => $exerciseData['weight'],
                ];
            }

            $workout->exercise()->attach($exercises);
        }
    }
}