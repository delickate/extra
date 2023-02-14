<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class FeedbackRating extends JsonResource
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
            'rating_comment' => $this->comment,
            'user_id' => $this->user_id,
            'rating' => $this->rating,
            'rating_datetime' => $this->rating_datetime
        ];
    }
}
