<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'order' => $this->order_number,
            // "video_url" => asset('storage/' . $this->video_url),
            "video_url" => $this->video_url,
            "module_id" => $this->module_id,
            // 'created_at' => $this->created_at->toDateTimeString(),
        ];;
    }
}
