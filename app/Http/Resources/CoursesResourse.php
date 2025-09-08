<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursesResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'image'           => $this->image,
            'title'           => $this->title,
            'about'           => $this->about,
            'price'           => $this->price,
            'time'            => $this->time,
            'days'            => $this->days,
            'start_of_class'  => $this->start_of_class,
            'is_active'       => (bool) $this->is_active,
            'sessions_count'  => $this->sessions_count,
            'students_count'  => $this->students_count,
            'prerequisite'    => $this->prerequisite,
        ];
    }
}
