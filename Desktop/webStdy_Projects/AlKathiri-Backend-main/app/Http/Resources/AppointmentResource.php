<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            "car" => $this->model ? $this->model->name . ' ' . $this->model_year : $this->model_name . ' ' . $this->model_year,
            "city" => $this->city->name,
            "branch" => $this->branch?->name,
            "maintenance_type" => __($this->maintenance_type),
            "name" => $this->name,
            "phone" => $this->phone,
            "email" => $this->email,
            "description" => $this->description,
            "date" => $this->date->format('Y-m-d'),
            "time" => $this->time->translatedFormat('h:i a'),
        ];
    }
}
