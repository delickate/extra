<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Subjects;
use App\RegisteredStudents;
use App\RegisteredTeachers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {

        $role = Auth::user()->getRoleNames()->toArray();
        switch ($role[0]) {
            case 'super-admin':
//              dd('fff');
                return '/users';
                break;
            case 'call-center':
                return '/shelterhomes';
                break;
            case 'department':
                return '/report';
                break;

          default:
            return '/home';
          break;
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        
        $subjects = Subjects::select('subject_id', 'subject_name')->get();
        return view('auth.register' , compact('subjects'));
    }
    
    public function showStudentsRegistrationForm()
    {
        return view('auth.registerStudent');
    }
    
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
  
        $this->create($request->all());
  
        return redirect("student/student/index")->withSuccess('IT WORKS!');
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
//            'cnic' => ['required', 'string', 'min:15', 'unique:users'],
            'cnic' => [ 'string', 'min:15', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'mobile' => ['required', 'numeric', 'min:13']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        if($data['role'] == 'student'){
           $role = '2';
        }else if($data['role'] == 'teacher'){
            $role = '3';
        }
        $user = User::create([
            'cnic' => (isset($data['cnic']))? $data['cnic'] : '',
            'name' => $data['name'],
            'father_name' => $data['father_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'pass_hint' => $data['password'],
            'password' => Hash::make($data['password']),
            'mobile' => $data['mobile'],
            'role_idFk' => $role
            
        ]);
        if($data['role'] == 'student'){
            $student = RegisteredStudents::create([
                'is_active' => '0',
                'created_at' => Carbon::now(),
                'created_by' => $user->user_id,
                'user_idFK' => $user->user_id,
            ]);
        }else if($data['role'] == 'teacher'){
            $student = RegisteredStudents::create([
               'is_active' => '0',
               'created_at' => Carbon::now(),
               'created_by' => $user->user_id,
               'user_idFK' => $user->user_id,
           ]);
        }
       
        return $user;
        
    }
}
