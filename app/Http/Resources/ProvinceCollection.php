<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\District;
use App\ShelterHome;
use App\Town;

class ProvinceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // 'provinces' => $this->collection,
            'districts' => new DistrictCollection(District::all()),
            'shelterhomes' => new ShelterHomeCollection(ShelterHome::all())
        ];
    }

    public function with($request)
    {
        return [
            'meta' => [
                'key' => 'value',
            ],
        ];
    }
}
