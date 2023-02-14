<?php

namespace App\Http\Controllers\Api;

use App\Feedback;
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
use GuzzleHttp\Client;


class FeedbackCheckinStatusController extends Controller
{

    private $_cnic            = null;
    private $_shelterId            = null;
    private $_GMSShelterId            = null;
    private $_user            = null;
    private $_androidId         = null;

    public function index(Request $request)
    {

        $this->_cnic        = $cnic = optional($request)->cnic;
        $this->_shelterId   = $shelter_id = optional($request)->shelter_id;


        $shelter_home = ShelterHome::where("id", $shelter_id)->first();
        if(!$shelter_home):
            return response()->json([
                'code' => 844,
                'status' => false,
                'message' => 'Invalid Panahgah',
                ]);
        endif;

        $this->_GMSShelterId = (int)$shelter_home->gms_shelter_id;
        if($this->_GMSShelterId <= 0){
            return response()->json([
                'code' => 844,
                'status' => false,
                'message' => 'This panahgah is not sync with GMS',
                ]);
        }

        $this->_handleHeader();

        $isCheckedIn = $this->_verifyCheckinFromGMS();
        if($isCheckedIn <= 0):
                return response()->json([
                    'code' => 842,
                    'status' => false,
                    'message' => 'User has not checked-in in last 3 days.',
                ]);
        endif;

        return response()->json([
            'code' => 843,
            'status' => true,
            'message' => 'Check-in of this provided CNIC found in last 3 days.'
        ]);

    }


    private function _verifyCheckinFromGMS(){


        $client = new Client(); //GuzzleHttp\Client

        $response = $client->post('https://pg.swd.punjab.gov.pk/api/visitor_status', [
            'form_params' => [
                'key' => 'ASTP@pitb#123',
                'cnic' => $this->_cnic,
                'shelter_id' => $this->_GMSShelterId
            ]
        ]);

        $result = json_decode($response->getBody(), true);
        if(isset($result['code'])){
            $status = (int)$result['code'];
        }else{
            $status = 0;
        }

        return $status;
    }

    private function _handleHeader(){

        $headers=array();
        foreach (getallheaders() as $name => $value):
            $headers[$name] = $value;
        endforeach;

        if(isset($headers['android_id'])):
            $this->_androidId = $headers['android_id'];
        endif;
    }


}


