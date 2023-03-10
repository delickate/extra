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
use App\AssessmentTest;
use App\RegisteredStudents;
use App\StudentTestResult;
use App\Courses;
use App\StudentCourses;
use App\QuestionsAnswers;
use PDF;

class StudentController extends Controller
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
                        
      $query = StudentCourses::select('*');

        $total_count = $query->where('student_idFK','=',$user_id)->count();        
       
        //$total_count = 0;
              
        return view( 'students.dashboard',compact('total_count') );
    }
     public function studentTest($type , $topic_id)
    {                  
        $query = AssessmentTest::select('*')->where('topic_idFK',$topic_id)->where('type_of_assessment',$type)->orderBy(DB::raw('RAND()'));
        $test = $query->paginate(50);
        $question_counts = count($test); 
        return view( 'students.assessment-test',compact('test' , 'question_counts' , 'type' , 'topic_id') );
    }  


     public function studentTestResult($test_result_id)
    { 

         
         
    //    $user_id = Auth::user()->user_id;
                        
        $query = StudentTestResult::select('*')->with('topic')->where('test_result_id',$test_result_id);
        $result = $query->join('course_levels', 'course_levels.level_id', '=', 'student_test_result.result_level_id')->
                    join('course_topics', 'course_topics.topic_id', '=', 'student_test_result.topic_idFK')
                ->first();
      
        
        return view( 'students.assessment-test-result',compact('result') );
    }  
    
    public function assessmentTest()
    { 
  
        
    //    $user_id = Auth::user()->user_id;
                        
        $query = AssessmentTest::select('*');
        $test = $query->paginate(50);
        $question_counts = count($test);

        return view( 'students.assessment-test',compact('test' , 'question_counts') );
    }
    public function assessmentSave(Request $request)
    { 
  
       $user_id = Auth::user()->user_id; 
          $this->validate($request, [
            'question_counts' => 'required',
            'topic_id' => 'required' ,
            'type' => 'required'
        ]);  
          
          
          $input = $request->all();
          $topic_id =  $input['topic_id'];
          $type =  $input['type'];
           $questions  = AssessmentTest::select('*')->where('topic_idFK',$topic_id)->where('type_of_assessment',$type)->get()->toArray();
           $obtain_marks = 0;
           
         
           foreach ($questions as $key => $value) 
           {
               
              $selected_answer =  $input[$value['question_id']];

              $weightage = AssessmentTest::select('*')->where('question_id', $value['question_id'])->first();

              $course_id   = $weightage->course_idFK;
              $activity_id = $weightage->activity_idFK;

              $curren_weightage = $weightage->weightage;

              $updated_weightage = $curren_weightage;

              $is_answer_correct = 0;
              //if answer is corrected
              if($selected_answer == $value['correct'])
              {
                    $updated_weightage = $updated_weightage+0.5;
                    $is_answer_correct = 1;

                    $obtain_marks++;
              }else{
                        //if answer if false
                        $updated_weightage = $updated_weightage-0.5;
                   }

                  AssessmentTest::where('question_id', $value['question_id'])->update(['weightage' => $updated_weightage]); 


                  #loging questions & their anwsers
                  $qna = new QuestionsAnswers;
                  $qna->qna_student_idfk        = $user_id;
                  $qna->qna_course_idfk         = $course_id;
                  $qna->qna_topic_idfk          = $topic_id;
                  $qna->qna_activity_idfk       = $activity_id;
                  $qna->qna_questions_idfk      = $value['question_id'];
                  $qna->qna_is_answer_correct   = $is_answer_correct;

                  $qna->save();
               
           }
     
           $obtain_percentage = round($obtain_marks/$input['question_counts']*100 , 2);
           $student_lavel = evaluateStudentlevel($obtain_percentage );
           
           #/////////////////////////////if pass move to next level
           $level = CourseTopicActivities::select('*')->where('activity_id', $activity_id)->first();
           
           $activity_weightage = $level->content_level_value;
           $new_level          = "Easy";
           $new_weightage      = "";

           if($student_lavel > 1)
           {
                $activity_weightage = $activity_weightage+0.5;
                $new_level          = get_level($activity_weightage);
                
           }else{
                    $activity_weightage = $activity_weightage-0.5;
                    $new_level          = get_level($activity_weightage);
                }  

           CourseTopicActivities::where('activity_id', $activity_id)->update(['content_level_value' => $activity_weightage, 'content_level' => $new_level]);      
           
           #update previous test as archive
                StudentTestResult::where('user_idFK', $user_id)->where('topic_idFK', $topic_id)->update(['is_latest' => '0']);
                


           #save new test result     
                $objIns = new StudentTestResult;
                $objIns->user_idFK = $user_id;
                $objIns->scour = $obtain_percentage;
                $objIns->type_of_assessment = $type;
                $objIns->topic_idFK = $topic_id;
                $objIns->result_level_id = $student_lavel;
                $objIns->created_at = date("Y-m-d H:i:s");
                $objIns->created_by = $user_id;
           
       // RegisteredStudents::where('user_idFK', $user_id)->update(['course_level' => $student_lavel]);

                //echo "<pre>"; print_r($objIns); die(); 
        if($objIns->save()){
            return redirect()->route('course.topics.result', ['test_result_id' =>$objIns->test_result_id])->with('success','Test successfully complete.');  
        }                        
        return redirect()->route('student.index')->with('error','Please Tray again.');  
    }


    function get_level($weightage)
    {
        $level = 'Easy';

        if($weightage>=1 && $weightage<=25)
        {
            $level = 'Easy';
        }elseif($weightage>=26 && $weightage<=50)
                {
                    $level = 'Medium';
                }elseif($weightage>=51 && $weightage<=75)
                        {
                            $level = 'Hard';
                        }elseif($weightage>=76 && $weightage<=100)
                                {
                                    $level = 'Expert';
                                }

        return $level;
    }
    
       public function courseSelection()
    { 
		$user_id = Auth::user()->user_id; 
		$student_id =  RegisteredStudents::where('user_idFK', $user_id)->first('student_id')->toArray()['student_id'];
		$courses = DB::table("courses")->select('*')

            ->whereNOTIn('course_id',function($query) use ($student_id){

               $query->select('course_idFK')->from('student_courses')->where('student_idFK', $student_id);

            })

            ->get();
        //$courses = Courses::with(['students','levels'])->where('student_courses.course_idFK', null)->get();
       
        return view( 'students.course-selection',compact('courses' ) );
    }
       public function courseEnrollment($course_id)
    { 
  
            $user_id = Auth::user()->user_id;
            $student_id =  RegisteredStudents::where('user_idFK', $user_id)->first('student_id')->toArray()['student_id'];
            
           if(empty($course_id) || empty($student_id)){
               return redirect()->route('student.course.selection')->with('error','Please Tray again.');
           } 
            
           $courseEnrolledCount = studentCourses::where('student_idFK', $student_id)->where('course_idFK', $course_id)->count();
           if($courseEnrolledCount == 0){
               
                $objIns = new studentCourses;
                $objIns->student_idFK = $student_id;
                $objIns->course_idFK = $course_id;
                $objIns->created_at = date("Y-m-d H:i:s");
                $objIns->created_by = $user_id;
                if($objIns->save()){
                   return redirect()->route('student.course.selection')->with('success','Course successfully Selected.');  
                }
               return redirect()->route('student.course.selection')->with('error','Please Tray again.');
           }else{
              return redirect()->route('student.course.selection')->with('error','Student already enrolled in this course');  
           }
           
           
        $courses =  Courses::getStudentCourses(Auth::user()->user_id);
        return view( 'students.course-selection',compact('courses' ) );
    }
    
    public function myCourse()
    { 
        
     $user_id = Auth::user()->user_id;   
     $student =  RegisteredStudents::where('user_idFK', $user_id)->first();
   
        $courses = Courses::with(['students','levels'])
                   ->join('student_courses', 'student_courses.course_idFK', '=', 'courses.course_id')
//      ->join('student_courses', function($join){
//            $join->on('student_courses.course_idFK', '=', 'courses.course_id');
//         //   $join->on('student_courses.student_idFK','=',$student->student_id); 
//        })

->where('student_courses.student_idFK',$student->student_id)
                    ->get();
        
        
        
        return view( 'students.my-course',compact('courses' ) );
    }
    
  
    
}
