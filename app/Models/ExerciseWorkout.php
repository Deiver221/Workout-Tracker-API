<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ExerciseWorkout extends Pivot
{
    protected $casts = [
        'reps' => 'array',
        'rir' => 'array',
    ];
}
