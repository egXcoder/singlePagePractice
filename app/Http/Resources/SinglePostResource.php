<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SinglePostResource extends JsonResource
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
            'subject'=>$this->title,
            'content'=>$this->body,
            'author'=>($this->author)?$this->author->name:'test',
            'posted_at'=>$this->created_at,
            'image_url'=>$this->image
        ];
    }
}
