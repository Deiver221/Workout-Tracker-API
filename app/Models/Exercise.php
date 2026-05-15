<?php

namespace App\Models;

use App\Models\Category;
use App\Models\MuscleGroup;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function muscleGroup()
    {
        $this->belongsTo(MuscleGroup::class);
    }
}
