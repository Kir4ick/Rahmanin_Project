<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->user;
        return [
            'id' => $this->id,
            'name' => $user->name,
            'middle_name' => $user->middle_name,
            'last_name' => $user->last_name,
            'phone' => $user->phone,
            'email' => $user->email,
            'created' => $user->created_at,
            'update' => $user->updated_at,
            'student_cart' => $this->student_cart,
            'group' => $this->group
        ];
    }
}
