<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityWithBranchResource extends JsonResource
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
            'name' => $this->name,
            'types' => [
                [
                    'name' => __('Show room'),
                    'branches' => BranchResource::collection($this->branches->where('type', 'show_room'))
                ] ,
                [
                    'name' => __('Maintenance center'),
                    'branches' => BranchResource::collection($this->branches->where('type', 'maintenance_center'))
                ] ,
                [
                    'name' => __('3s center'),
                    'branches' => BranchResource::collection($this->branches->where('type', '3s_center'))
                ] ,
            ],
        ];
    }
}
