<?php

namespace App\Models;

use App\Models\Category;
use App\Models\MuscleGroup;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function muscleGroup()
    {
        return $this->belongsTo(MuscleGroup::class);
    }
}
