<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\http\Resources\Tag as TagResource;

class Lesson extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return  [
            'Author' => $this->user->name,
            'title' => $this->titel,
            'content' => $this->body,
            // 'Tag' => TagResource::collection($this->tags),

        ];
    }
}
