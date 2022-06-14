<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArrearByTeacherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $student = $this->student->user;
        $lesson = $this->lesson->name;
        return [
            'id' => $this->id,
            'semester' => $this->semester,
            'name' => $student->name,
            'middle_name' => $student->middle_name,
            'last_name' => $student->last_name,
            'student_cart' => $student->student_cart,
            'closed' => $this->closed,
            'lesson' => $lesson
        ];
    }
}
