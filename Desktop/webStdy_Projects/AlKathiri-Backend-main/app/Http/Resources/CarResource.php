<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'model_id' => $this->model_id,
            'name' => $this->name,
            'main_image' => $this->main_image_path,
            'selling_price' => $this->selling_price,
            'selling_price_after_vat' => $this->selling_price_after_vat,
            'is_in_favorite' => false,
            'meta_tag_description' => $this->meta_desc,
            'meta_tag_keywords' => $this->meta_keywords,
        ];
    }
}
