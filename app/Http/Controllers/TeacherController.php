<?php
namespace App\Http\Controllers;

use http\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Collection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ShelterHomeExport;
use Carbon\Carbon;
use Auth;
use App\Http\Requests\CompanyRequest;
use App\Courses;
use App\Subjects;
use App\User;
use App\RegisteredTeachers;
use App\CourseTopicActivities;
//use PDF;
use App\RegisteredStudents; 

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $user_info;

        
    function __construct()
    {       
//        $this->middleware(function ($request, $next)
//        {
//          $this->user_info=Auth::user(); // returns user
//          //dd($this->user_info->user_id);
//          return $next($request);
//        });
                
//         $this->middleware('permission:panahgah-list');
//         $this->middleware('permission:panahgah-create', ['only' => ['create','store']]);
//         $this->middleware('permission:panahgah-edit', ['only' => ['edit','update']]);
//         $this->middleware('permission:panahgah-delete', ['only' => ['destroy']]);
                        
//        $unread_notification_count = Notification::unreadNotificationCount();
//        $total_notification_count = Notification::notificationCount();
//        $notifications = Notification::allNotification();
//        // Sharing is caring
//        View::share('unread_notification_count', $unread_notification_count);
//        View::share('total_notification_count', $total_notification_count);
//        View::share('notifications', $notifications);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        
        $user_id = Auth::user()->user_id;
                        
      $query = RegisteredStudents::select('*');

      $total_count = $query->where('user_idFK', '=', $user_id)->count();        

        return view( 'teachers.dashboard',compact('total_count') );
    }
	
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'coursename' => ['required', 'string', 'max:255']
        ]);
    }
	
    public function studentList(Request $request)
    { 
        
        $students = RegisteredStudents::
                join('users', 'users.user_id', '=', 'registered_students.user_idFK')->
                join('course_levels', 'course_levels.level_id', '=', 'registered_students.course_level')->
                where('users.role_idFK' , 3)
                ->get();
  
        //  $total_count = 0;
        return view( 'teachers.student-list',compact('students') );
    }
    
    public function teacherCoursesList()
    { 
        
     $user_id = Auth::user()->user_id;   
     $student =  RegisteredStudents::where('user_idFK', $user_id)->first();
   
        $courses = Courses::with(['user','levels'])
                  //  ->join('student_courses', 'student_courses.course_idFK', '=', 'courses.course_id')
//      ->join('student_courses', function($join){
//            $join->on('student_courses.course_idFK', '=', 'courses.course_id');
//         //   $join->on('student_courses.student_idFK','=',$student->student_id); 
//        })

->where('courses.created_by',$user_id)
                    ->get();

        
        return view( 'teachers.course_list',compact('courses' ) );
    }
    public function teacherProfile()
    { 
        
     $user_id = Auth::user()->user_id;  
 
     $old = RegisteredTeachers::join('users', 'users.user_id', '=', 'registered_teachers.user_idFK')->where('user_idFK', $user_id)->first();
  
       $subjects = Subjects::select('subject_id', 'subject_name')->get(); 
        return view( 'teachers.teacher_profile',compact('old','subjects' ) );
    }
    
    
    public function teacherProfileUpdate(Request $request , $id)
    {
        
         $user_id = Auth::user()->user_id;
        
        $this->validate($request, [
            'name' => 'required',
            'password' => 'same:confirm-password',
        ]);

        
        $post = $request->all();
        $input['name'] = $post['name'];
        $user = User::find($user_id);
        $user->update($input);      
        return redirect()->route('teacher.profile')->with('success', 'Profile updated successfully');
    }
    
	public function teacherAddContent($topic_id){
		return view('teachers.atool', compact('topic_id'));
	}
	
	public function teacherSaveContent(Request $request){
		$post = $request->all();
		$user_id = Auth::user()->user_id;
		$input['activity_name'] = $post['atitle'];
		$input['activity_text'] = $post['activityContent'];
		$input['taxonomy_type'] = $post['taxonomy']; 
		$input['bloom_type'] = $post['bloom'];
		$input['solo_type'] = $post['solo']; 
		$input['score'] = 50;
		$input['content_level'] = $post['contentlevel'];
        $input['content_level_value'] = $post['contentlevelValue'];
		$input['activity_type'] = 'text';
		$input['topic_idFK'] = $post['topic_id'];
		$input['created_by'] = $user_id;
		$input['created_at'] = Carbon::now()->toDateTimeString();
		
		CourseTopicActivities::create($input);
		return redirect()->route('teacher.addcontent', $post['topic_id'])->with('success', 'Content added successfully');
	}
	
	public function teacherCreateCourse(){
		return view('teachers.create_course');
	}
	
	public function teacherAddCourse(Request $request){
		$post = $request->all();
		$user_id = Auth::user()->user_id;
		
		$input['course_name'] = $post['coursename'];
		$input['created_by'] = $user_id;
		$input['created_at'] = Carbon::now()->toDateTimeString();
		
		Courses::create($input);
		return redirect()->route('teacher.createcourse')->with('success', 'Course added successfully');
	}
}