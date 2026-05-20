<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id'           => $this->id,
        'name'         => $this->name,
        'notes'        => $this->notes,
        'scheduled_at' => $this->scheduled_at,
        'status'       => $this->status,
        'exercises'    => $this->exercise->map(fn($exercise) => [
            'id'     => $exercise->id,
            'name'   => $exercise->name,
            'sets'   => $exercise->pivot->sets,
            'reps'   => $exercise->pivot->reps,
            'rir'    => $exercise->pivot->rir,
            'weight' => $exercise->pivot->weight,
        ]),
    ];
    }
}
