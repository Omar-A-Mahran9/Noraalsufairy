<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarColorResource extends JsonResource
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
            'id' => $this->id,
            'hex_code' => $this->hex_code,
            'name' => $this->name,
            'images' => $this->getColorImagesWithFullPath(),
        ];
    }

    public function getColorImagesWithFullPath()
    {
        $images = array_merge(json_decode($this->pivot->inner_images ?? '[]'), json_decode($this->pivot->outer_images ?? '[]'));

        foreach ($images as $key => $image) {
            $images[$key] = getImagePathFromDirectory($image, 'Cars');
        }

        return $images;
    }
}
