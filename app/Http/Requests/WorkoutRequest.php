<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class WorkoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'scheduled_at' => 'required|date',
            'exercises' => 'required|array|min:1',
            'exercises.*.exercise_id'   => 'required|integer|exists:exercises,id',
            'exercises.*.sets'          => 'required|integer|min:1',
            'exercises.*.reps'          => 'required|array|min:1',
            'exercises.*.reps.*'        => 'required|integer|min:1',
            'exercises.*.rir'           => 'required|array|min:1',
            'exercises.*.rir.*'         => 'required|integer|min:0',
            'exercises.*.weight'        => 'required|numeric|min:0',
        ];
    }
}
