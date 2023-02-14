<?php

namespace App\Http\Controllers\Api;


use App\Feedback;
use App\FeedbackAction;
use App\FeedbackRating;
use App\Http\Controllers\Controller;
use App\ShelterHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FeedbackActionController extends Controller
{

    private $_userId            = null;
    private $_androidId         = null;
    private $_feedbackObj       = null;

    public function index(Request $request)
    {
        $input = collect(json_decode($request->data, true));

        if(isset($input['user_id'])):
            if(!auth('api')->check()):
                return response()->json([
                    'code' => 801, // 801 is special code , mobile dev will logout current user on this code.
                    'status' => false,
                    'message' => 'Unauthorized'
                    ]);
            endif;
            $this->_userId = auth('api')->user()->id;
        endif;

        $validateFeedbackCode = "";
        if(!isset($input['user_id'])):
            $validateFeedbackCode = "exists:feedback,feedback_code";
        endif;

        $this->_handleHeader();

        $validator = Validator::make($input->all(), [
            "action_datetime" => 'required',
            "feedback_id" => 'exists:feedback,id',
            "action_type" => 'required',
            "rating" => 'required_if:action_type,close',
            "rating_comment" => 'required_if:action_type,close',
            "complaint_code" => $validateFeedbackCode
            ]);

            if ($validator->fails()) {

                return response()->json([
                    'code' => 821,
                    'status' => false,
                    'message' => validationErrorsToString($validator->errors()),
                    ]);
                }

           $this->_feedbackObj = Feedback::find($input['feedback_id']);
           if(!$this->_userId):
                $this->_userId = $this->_feedbackObj->user_id;
           endif;

        return $this->_save($input);
    }

    private function _save($input)
    {
        $feedbackAction = new FeedbackAction;

        $feedbackAction->user_id = $this->_userId;
        $feedbackAction->feedback_id = $this->_feedbackObj->id;
        $feedbackAction->action_type = $input['action_type'];
        $feedbackAction->action_datetime = $input['action_datetime'];

        if(isset($input['rating_comment'])):
            $feedbackAction->action_comment = $input['rating_comment'];
        endif;

        $feedbackAction->created_at = Carbon::now();
        $feedbackAction->android_id = $this->_androidId;


        try {

            $feedbackAction->save();

            if($input['action_type'] == 'close'){
                $closed = $this->_closeFeedback();
                if($closed['status'] == false):
                    return response()->json($closed);
                endif;


                $rated = $this->_saveFeedbackRating($input);
                if($rated['status'] == false):
                    return response()->json($rated);
                endif;

            } else if($input['action_type'] == 'reopen'){
                $reopened = $this->_reopenFeedback();
                if($reopened['status'] == false):
                    return response()->json($reopened);
                endif;

            } else if($input['action_type'] == 'resolve'){
                $resolved = $this->_resolveFeedback();
                if($resolved['status'] == false):
                    return response()->json($resolved);
                endif;

            }else{
                return response()->json([
                    'code' => 836,
                    'status' => false,
                    'message' => 'Unknown action',
                ]);
            }

            return response()->json([
                'code' => 822,
                'status' => true,
                'message' => 'Feedback action submitted successfully!'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 823,
                'status' => false,
                'message' => 'Error!',
                'exception' => $th
            ]);
        }
    }

    private function _saveFeedbackRating($input){

        $feedbackRating = new FeedbackRating();

        $feedbackRating->user_id = $this->_userId;
        $feedbackRating->feedback_id = $this->_feedbackObj->id;
        $feedbackRating->rating = $input['rating'];
        $feedbackRating->comment = $input['rating_comment'];
        $feedbackRating->rating_datetime = $input['action_datetime'];
        $feedbackRating->created_at = Carbon::now();
        $feedbackRating->android_id = $this->_androidId;

        try {

            $feedbackRating->save();

            return [
                'code' => 841,
                'status' => true,
                'message' => 'Feedback rated successfully.'
            ];


        } catch (\Throwable $th) {
            return [
                'code' => 833,
                'status' => false,
                'message' => 'Error!',
                'exception' => $th
            ];
        }

    }

    private function _resolveFeedback(){

        if($this->_feedbackObj->is_closed == 1){
            return [
                'code' => 834,
                'status' => false,
                'message' => 'Sorry, you can not resolve a closed complaint.',
            ];
        }


        if($this->_feedbackObj->feedback_status == 1 ){
            return [
                'code' => 834,
                'status' => false,
                'message' => 'Sorry, this complaint is already resolved'
            ];
        }


        try {

            $this->_feedbackObj->feedback_status = 1;
            $this->_feedbackObj->save();

            return [
                'code' => 838,
                'status' => true,
                'message' => 'Feedback resolved successfully.'
            ];


        } catch (\Throwable $th) {
            return [
                'code' => 835,
                'status' => false,
                'message' => 'Error!',
                'exception' => $th
            ];
        }


    }


    private function _reopenFeedback(){

        if($this->_feedbackObj->is_closed == 1){
            return [
                'code' => 834,
                'status' => false,
                'message' => 'Sorry, you can not reopen a closed complaint.',
            ];
        }

        if($this->_feedbackObj->user_id !=  $this->_userId){
            return [
                'code' => 838,
                'status' => false,
                'message' => 'Sorry, you are not allowed to reopen this complaint.',
            ];
        }

        if($this->_feedbackObj->reopened_count >= 3 ){
            return [
                'code' => 834,
                'status' => false,
                'message' => 'Sorry, this complaint has exceeded reopen limit.',
            ];
        }

        if($this->_feedbackObj->feedback_status != 1 ){
            return [
                'code' => 834,
                'status' => false,
                'message' => 'Sorry, this complaint is already opened',
            ];
        }


        try {

            $this->_feedbackObj->feedback_status = 2;
            $this->_feedbackObj->reopened_count = ($this->_feedbackObj->reopened_count)+1;
            $this->_feedbackObj->save();

            return [
                'code' => 838,
                'status' => true,
                'message' => 'Feedback reopend successfully.'
            ];


        } catch (\Throwable $th) {
            return [
                'code' => 835,
                'status' => false,
                'message' => 'Error!',
                'exception' => $th
            ];
        }
    }




    private function _closeFeedback(){

        if($this->_feedbackObj->is_closed == 1){
            return [
                'code' => 839,
                'status' => false,
                'message' => 'Feedback is already closed'
            ];

        }

        if($this->_feedbackObj->user_id !=  $this->_userId){
            return [
                'code' => 838,
                'status' => false,
                'message' => 'Sorry, you are not allowed to close this complaint.',
            ];
        }


        try {

            $this->_feedbackObj->is_closed = 1;
            $this->_feedbackObj->save();
            return [
                'code' => 840,
                'status' => true,
                'message' => 'Feedback closed successfully.'
            ];



        } catch (\Throwable $th) {
            return [
                'code' => 837,
                'status' => false,
                'message' => 'Error!',
                'exception' => $th
            ];
        }
    }




    private function _handleHeader(){

        $headers=array();
            foreach (getallheaders() as $name => $value) {
                $headers[$name] = $value;
            }
        if(isset($headers['android_id'])):
            $this->_androidId = $headers['android_id'];
        endif;

    }


}


