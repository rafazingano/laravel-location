<?php

namespace ConfrariaWeb\Location\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryRegionResource extends JsonResource
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
            'name' => $this->name,
            'states' => StateResource::collection($this->states),
        ];
    }
}
