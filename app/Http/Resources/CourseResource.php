<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $includeProfessors = !$request->has("professors");

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => new CategoryResource($this->category),
            "modules" => ModuleResource::collection($this->modules),
            'created_at' => $this->created_at->toDateTimeString(),
            'professors' => $includeProfessors ? UserResource::collection($this->professors) : null,
        ];
    }
}
