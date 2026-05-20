<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;


class WorkoutController extends Controller
{
    public function store(Request $request)
    {
        $workout = Workout::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'notes' => $request->notes,
            'scheduled_at' => $request->scheduled_at,
            'status' => 'pending'

        ]);

        $exercises = [];
        foreach ($request->exercises as $exercise)
        {
            $exercises[$exercise['exercise_id']] = [
                'sets' => $exercise['sets'],
                'reps' => $exercise['reps'],
                'rir' => $exercise['rir'],
                'weight' => $exercise['weight']
            ];
        }

        $workout->exercise()->attach($exercises);

        return response()->json($workout->load('exercise'), 201);
    }
}
