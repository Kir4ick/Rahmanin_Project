<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttestationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $student = $this->student;
        $user = $student->user;
        return [
            'id' => $this->id,
            'semester' => $this->semester,
            'rate' => $this->rate,
            'name' => $user->name,
            'middle_name' => $user->middle_name,
            'last_name' => $user->last_name,
            'student_cart' => $student->student_cart
        ];
    }
}
