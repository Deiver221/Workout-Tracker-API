<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorkoutRequest;
use App\Models\Workout;
use Illuminate\Http\Request;
use App\Http\Resources\WorkoutResource;

class WorkoutController extends Controller
{
    public function store(WorkoutRequest $request)
    {
        $workout = Workout::create([
            'user_id'      => $request->user()->id,
            'name'         => $request->name,
            'notes'        => $request->notes,
            'scheduled_at' => $request->scheduled_at,
            'status'       => 'pending'
        ]);

        $exercises = [];
        foreach ($request->exercises as $exercise) {
            $exercises[$exercise['exercise_id']] = [
                'sets'   => $exercise['sets'],
                'reps'   => $exercise['reps'],
                'rir'    => $exercise['rir'],
                'weight' => $exercise['weight']
            ];
        }

        $workout->exercise()->attach($exercises);

        return response()->json($workout->load('exercise'), 201);
    }

    public function index(Request $request)
    {
        $workouts = Workout::with(['exercise'])
            ->where('user_id', $request->user()->id)
            ->get();

        return WorkoutResource::collection($workouts);
    }

    public function show(Workout $workout, Request $request)
    {
        if ($request->user()->id !== $workout->user_id) {
            abort(404, 'Not found');
        }

        $workout->load(['user', 'exercise']);

        return new WorkoutResource($workout);
    }
}
