<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CareerResource extends JsonResource
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
            "short_description" => $this->short_description,
            "long_description" => $this->long_description,
            "address" => $this->address,
            "city_id" => $this->city_id,
            "created_at" => $this->created_at->diffForHumans(),
        ];
    }
}
