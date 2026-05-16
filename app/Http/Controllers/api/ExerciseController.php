<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExerciseResource;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercises = Exercise::with([
            'muscleGroup',
            'category'
        ])->paginate(5);

        return ExerciseResource::collection($exercises);
    }



    public function show(Exercise $exercise)
    {
        return new ExerciseResource($exercise);
    }
}
