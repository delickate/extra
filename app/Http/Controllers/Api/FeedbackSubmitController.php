<?php

namespace App\Http\Controllers\Api;

use App\Feedback;
use App\Http\Controllers\Controller;
use App\ShelterHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Throwable;

class FeedbackSubmitController extends Controller
{
    public function index(Request $request)
    {
        $input = collect(json_decode($request->data, true));
        $input->put('picture', $request->picture);

        if (isset($input['user_id'])) :
            if (!auth('api')->check()) :
                return response()->json([
                    'code' => 801, // 801 is special code , mobile dev will logout current user on this code.
                    'status' => false,
                    'message' => 'Unauthorized'
                ]);
            endif;
        endif;

        $validator = Validator::make($input->all(), [
            "activity_datetime" => 'required',
            "bedding" => 'required',
            "cleanliness" => 'required',
            "cleanliness_level" => 'required_if:cleanliness,yes',
            "electricity" => 'required',
            "f_lat_long" => 'required',
            "food" => 'required',
            "district_idFk" => 'exists:districts,id',
            "shower" => 'required',
            "toilet" => 'required',
            "shelter_home_id" => 'exists:shelter_homes,id',
            "corona_sops" => 'required',
            "electrical_machines" => 'required',
            "hall_cleanliness" => 'required',
            "hand_washing" => 'required',
            "medical_checkup" => 'required',
            "water" => 'required',
            "picture" => 'required|mimes:jpeg,jpg,png,JPG,JPEG',
            // "visit_date" => 'required',
            // "security" => 'required',
            // "comment" => 'required',
            // "doctor" => 'required',

            // "user_id" =>  Rule::requiredIf(auth('api')->check()),

            "visitor_female" => Rule::requiredIf(auth('api')->check()),
            "visitor_kids" => Rule::requiredIf(auth('api')->check()),
            "visitor_male" => Rule::requiredIf(auth('api')->check()),

            "name" => Rule::requiredIf(!auth('api')->check()),
            "cnic" => Rule::requiredIf(!auth('api')->check()),
            "mobile" => Rule::requiredIf(!auth('api')->check())
        ]);

        if ($validator->fails()) {

            return response()->json([
                'code' => 821,
                'status' => false,
                'message' => validationErrorsToString($validator->errors()),
            ]);
        }


        return auth('api')->check() ? $this->save($input) : $this->save($input, 'guest');
    }

    private function save($input, $requestType = 'auth')
    {
        $feedback = new Feedback;
        $feedback->bedding = $input['bedding'];
        $feedback->activity_datetime = $input['activity_datetime'];

        if (isset($input['visit_date'])) :
            $feedback->visit_date = $input['visit_date'];
        endif;

        $feedback->cleanliness = $input['cleanliness'];
        $feedback->electricity = $input['electricity'];
        $feedback->f_lat_long = $input['f_lat_long'];
        $feedback->food = $input['food'];
        // $feedback->security = $input['security'];
        $feedback->shower = $input['shower'];
        $feedback->toilet = $input['toilet'];

        $feedback->comment = $input['comment'];

        if (isset($input['cleanliness_level'])) :
            $feedback->cleanliness_level = $input['cleanliness_level'];
        endif;

        if (isset($input['visitor_female'])) :
            $feedback->visitor_female = $input['visitor_female'];
        endif;

        if (isset($input['visitor_male'])) :
            $feedback->visitor_male = $input['visitor_male'];
        endif;

        if (isset($input['visitor_kids'])) :
            $feedback->visitor_kids = $input['visitor_kids'];
        endif;

        $feedback->district_id = $input['district_idFk'];
        $feedback->panagah_id = $input['shelter_home_id'];

        $shelterHome = ShelterHome::find($input['shelter_home_id']);
        $feedback->feedback_code = $shelterHome->generateFeedbackCode();


        $feedback->extra_attributes = [
            "corona_sops" => $input['corona_sops'],
            "electrical_machines" => $input['electrical_machines'],
            "hall_cleanliness" => $input['hall_cleanliness'],
            "hand_washing" => $input['hand_washing'],
            "medical_checkup" => $input['medical_checkup'],
            "drinkable_water" => $input['water'],
            // "doctor" => $input['doctor'],
        ];

        try {

            if ($requestType == 'guest') {
                $cnic_user = User::notDeleted()->where("cnic", $input['cnic'])->first();
                if ($cnic_user) {
                    $feedback->user_id = $cnic_user->id;
                    $feedback->save();
                } else {
                    $user  = new User;
                    $user->name = $input['name'];
                    $user->mobile = $input['mobile'];
                    $user->cnic = $input['cnic'];
                    $user->username = Str::random(6);
                    $user->password = Hash::make(Str::random(6));
                    $user->save();
                    $user->assignRole('guest');

                    $user->complaints()->save($feedback);
                }
            } else {
                $feedback->user_id = auth('api')->user()->id;
                $feedback->save();
            }
            $feedback->addMedia($input['picture'])->toMediaCollection();

            $feedback->send_push_notifications();

            return response()->json([
                'complaint_id' => $feedback->id,
                'feedback_code' => $feedback->feedback_code,
                'cnic' => $feedback->user->cnic,
                'status' => true,
                'code' => 822,
                'message' => 'Feedback received successfully!'
            ]);
        } catch (Throwable $th) {
            return response()->json([
                'code' => 823,
                'status' => false,
                'message' => $th->getMessage(),
                'exception' => $th->getMessage()
            ]);
        }
    }
}
