<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "main_image" => $this->main_image_path,
            "cover_image" => $this->cover_image_path,
            "tags" => implode(" , ", $this->tags),
            "description" => $this->description,
            "created_at" => $this->created_at->diffForHumans(),
        ];
    }
}
