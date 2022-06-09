<?php

namespace ConfrariaWeb\Location\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
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
            'state_id' => $this->state_id,
            'state_micro_region_id' => $this->state_micro_region_id,
            'name' => $this->name,
            'text' => $this->name,
            /*'districts' => DistrictResource::collection($this->districts),*/
        ];
    }
}
