<?php

namespace ConfrariaWeb\Location\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
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
            'country_id' => $this->country_id,
            'country_region_id' => $this->country_region_id,
            'code' => $this->code,
            'name' => $this->name,
            'text' => $this->name,
            'cities' => CityResource::collection($this->cities),
        ];
    }
}
