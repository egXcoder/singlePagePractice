<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostsResource extends JsonResource
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
            'slug' => $this->slug,
            'subject'=>$this->title,
            'posted_at'=>$this->created_at,
            'author'=>($this->author)?$this->author->name:'test'
        ];
    }
}
