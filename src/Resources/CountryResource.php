<?php

namespace ConfrariaWeb\Location\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code_phone' => $this->code_phone,
            'states' => StateResource::collection($this->states),
            'regions' => CountryRegionResource::collection($this->regions),
            'cities' => CityResource::collection($this->cities),
        ];
    }
}
