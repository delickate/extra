<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FeedbackRatingCollection;



class Feedback extends JsonResource
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
            'complaint_id' => $this->id,
            'user_id' => $this->user_id,
            'district_idFk'=> $this->district_id,
            'district_name' => $this->district->name,
            'shelter_home_id' => $this->panagah_id,
            'visitor_kids' => $this->visitor_kids,
            'visitor_male' => $this->visitor_male,
            'visitor_female' => $this->visitor_female,
            'comment' => $this->comment,
            'feedback_code' => $this->feedback_code,
            'feedback_status' => $this->feedback_status,
            'reopened_count' => $this->reopened_count,
            'shelter_home_name' => $this->shelterHome->name,
            'visit_date' => $this->visit_date,
            'activity_datetime' => $this->activity_datetime,
            'bedding' => $this->bedding,
            'cleanliness' => $this->cleanliness,
            'security' => $this->security,
            'cleanliness_level' => $this->cleanliness_level,
            'electricity' => $this->electricity,
            'f_lat_long' => $this->f_lat_long,
            'food' => $this->food,
            'shower' => $this->shower,
            'toilet' => $this->toilet,
            "corona_sops" => $this->extra_attributes->corona_sops,
            "doctor" => $this->extra_attributes->doctor,
            "electrical_machines" => $this->extra_attributes->electrical_machines,
            "hall_cleanliness" => $this->extra_attributes->hall_cleanliness,
            "hand_washing" => $this->extra_attributes->hand_washing,
            "medical_checkup" => $this->extra_attributes->medical_checkup,
            "water" => $this->extra_attributes->drinkable_water,
            "is_closed" => $this->is_closed,
            'picture' => $this->getFirstMedia()->getFullUrl(),
            // 'rating1' => $this->rating()->get()->toArray(),
            'rating' => new FeedbackRatingCollection($this->rating()->get())
        ];
    }
}
