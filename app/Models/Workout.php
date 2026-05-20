<?php

namespace App\Models;

use App\Models\Exercise;
use App\Models\ExerciseWorkout;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'notes',
        'scheduled_at',
        'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercise()
    {
        return $this->belongsToMany(Exercise::class)
            ->using(ExerciseWorkout::class)
            ->withPivot(['sets', 'reps', 'rir', 'weight'])
            ->withTimestamps();
    }
}
