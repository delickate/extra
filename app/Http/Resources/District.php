<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class District extends JsonResource
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
            'district_id' => $this->id,
            'name' => $this->name,
            'lat' => $this->lat,
            'lng' => $this->lng
        ];
    }
}
