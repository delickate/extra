<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShelterHome extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'shelter_id' => $this->id,
            'district_id' => $this->district_id,
            'name' => $this->name,
            'name_urdu' => $this->name_urdu,
            'total_beds' => $this->beds ,
            'occupied_beds' => $this->occupied_beds,
            'location_lat' => $this->lat,
            'location_lng' => $this->lng
        ];
    }
}
