<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    private $_androidId     = null;
    private $_fcmToken      = null;

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $this->_handleHeader();

        $credentials = request(['username', 'password']);
        $credentials['is_deleted'] = 0;

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'code' => 812,
                'status' => false,
                'message' => 'Unauthorized'
            ]);
        }

        $user = User::where('username', $request->username)->first();
        if (!Hash::check($request->password, $user->password, [])) {

            return response()->json([
                'code' => 815,
                'status' => false,
                'message' => 'Error in Login'
            ]);
            // throw new \Exception('Error in Login');
        }

        $token = Str::random(80);
        $user->forceFill([
            'api_token' => $token,
            'fcm_token' => $this->_fcmToken,
            'android_id' => $this->_androidId
        ])->save();

        return response()->json([
            'code' => 813,
            'status' => true,
            'message' => 'Login Successfull.',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user_id' => $user->id,
            'username' => $user->username,
            'district_id' => $user->district_id,
            'android_id' => $this->_androidId
        ]);
    }

    function logout()
    {

        $user = Auth::guard('api')->user();

        if($user):
            $user->api_token = null;
            $user->android_id = null;
            $user->save();
        endif;

        return response()->json([
            'code' => 814,
            'status' => true,
            'message' => 'User logged out.'
        ]);
    }


    private function _handleHeader(){

        $headers=array();
            foreach (getallheaders() as $name => $value) {
                $headers[$name] = $value;
            }
        if(isset($headers['android_id'])):
            $this->_androidId = $headers['android_id'];
        endif;

        if(isset($headers['fcm_token'])):
            $this->_fcmToken = $headers['fcm_token'];
        endif;


    }
}
