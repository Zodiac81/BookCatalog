<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> (int) $this->id,
            'title' => (string) $this->title,
            'authors' => AuthorResource::collection($this->authors),
            'rubrics' => RubricResource::collection($this->rubrics)
        ];
    }
}
