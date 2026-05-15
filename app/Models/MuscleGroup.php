<?php

namespace App\Models;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Model;

class MuscleGroup extends Model
{
    public function exercises()
    {
        $this->hasMany(Exercise::class);
    }
}
