<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreFeedbackActivity extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            "activity_datetime" => 'required',
            "bedding" => 'required',
            "cleanliness" => 'required',
            "electricity" => 'required',
            "f_lat_long" => 'required',
            "food" => 'required',
            "district_idFk" => 'required',
            "security" => 'required',
            "shower" => 'required',
            "toilet" => 'required',
            "shelter_home_id" => 'required',
            "user_id" => 'required',
            "picture" => 'required|image',
            "name" => 'sometimes|required',
            "cnic" => 'sometimes|required',
            "mobile" => 'sometimes|required',
        ];
    }
}
