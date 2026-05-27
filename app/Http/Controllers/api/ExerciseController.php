<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResource;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index(Request $request)
    {
        $exercises = Exercise::with(['muscleGroup', 'category'])
            ->when($request->muscle_group, function ($query, $value) {
                $query->where('muscle_group_id', $value);
            })
            ->when($request->category, function ($query, $value) {
                $query->where('category_id', $value);
            })
            ->paginate(5);

        return ExerciseResource::collection($exercises);
    }

    public function show(Exercise $exercise)
    {
        $exercise->load(['muscleGroup', 'category']);
        return new ExerciseResource($exercise);
    }
}
