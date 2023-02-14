<?php

namespace App\Http\Controllers\Api;

use App\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Resources\Feedback as FeedbackResource;
use App\Http\Resources\FeedbackCollection;
use Illuminate\Http\Request;
use App\User;

class MyFeedbackkController extends Controller
{
    private $_user = null;

    public function index(Request $request)
    {
        $cnic = optional($request)->cnic;

        if($cnic!= ""){

            $this->_user = User::notDeleted()->where("cnic", $cnic)->first();
            if(!$this->_user):
                return response()->json([
                    'code' => 801,
                    'status' => false,
                    'message' => 'User not found against provided CNIC.',
                ]);
            endif;

            $feedback = Feedback::notDeleted()->with('district' , 'shelterhome')
            ->where("user_id", $this->_user->id)
            ->get();

                if($feedback->isEmpty()):
                    return response()->json([
                        'code' => 835,
                        'status' => false,
                        'message' => 'No feedback found against provided CNIC.',
                    ]);
                endif;

            }else{

            if(!auth('api')->check()):
                return response()->json([
                    'code' => 801, // 801 is special code , mobile dev will logout current user on this code.
                    'status' => false,
                    'message' => 'Unauthorized'
                    ]);
            endif;


            $user = $this->_user = User::find($request->user_id);
            if (!$this->_user):
                return response()->json([
                    'code' => 831,
                    'status' => false,
                    'message' => 'User not found'
                ]);
            endif;


            $feedback = Feedback::notDeleted()->with('district' , 'shelterhome')
            ->whereUserId($this->_user->id)
            ->get();
        }

        return response()->json([
            'code' => 832,
            'status' => true,
            'message' => 'success',
            'data' => new FeedbackCollection($feedback)
        ]);
    }
}
