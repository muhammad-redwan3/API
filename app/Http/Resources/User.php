<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\http\Resources\Lesson as LessonResource;


class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //يقوم بإرجاع جميع المعلومات التي يقموم اليوز في طلبها 
        // return parent::toArray($request);

        // if (is_null($this->sort)) {
        //     return "-";
        // }
        return  [
            'name' => $this->name,
            'email' => $this->email,
            'lessons' => LessonResource::collection($this->lessons),
        ];
    }
}
