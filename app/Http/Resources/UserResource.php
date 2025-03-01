<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $userData = [];


        if ($this->role->name == 'professor') {
            $userData = [
                'position' => $this->professorData->position ?? null,
                'company' => $this->professorData->company ?? null,
                'gender' => $this->professorData->gender ?? null,
                'birth_date' => $this->professorData->birth_date ?? null,
                'work_experience_years' => $this->professorData->work_experience_years ?? null,
            ];
        } elseif ($this->role->name == 'student') {
            $userData = [
                'gender' => $this->studentData->gender ?? null,
                'birth_date' => $this->studentData->birth_date ?? null,
                'school_year' => $this->studentData->school_year ?? null,
                'field_of_study' => $this->studentData->field_of_study ?? null,
                'current_school' => $this->studentData->current_school ?? null,
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role->name,
            'profile' => $userData,
        ];
    }
}
