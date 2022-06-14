<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArrearResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $teacher = $this->teacher->user;
        $lesson = $this->lesson->name;
        return [
            'id' => $this->id,
            'semester' => $this->semester,
            'name' => $teacher->name,
            'middle_name' => $teacher->middle_name,
            'last_name' => $teacher->last_name,
            'closed' => $this->closed,
            'lesson' => $lesson
        ];
    }
}
