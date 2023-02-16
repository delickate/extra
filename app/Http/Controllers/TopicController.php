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
use Carbon\Carbon;
use Auth;
use App\AssessmentTest;
use App\RegisteredStudents;
use App\Courses;
use App\CourseTopics;
use App\CourseTopicActivities;
use PDF;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $user_info;

        
    function __construct()
    {       
		
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course_id)
    { 
  
       // DB::enableQueryLog();

        $user_id = Auth::user()->user_id;
       $topics = CourseTopics::
               leftJoin('student_test_result', 'student_test_result.topic_idFK', '=', 'course_topics.topic_id')
               ->join("course_levels",function($join){
                    $join->on("course_levels.level_id","=","course_topics.topic_level_id");
                })
               ->where('course_topics.course_idFK',$course_id)
               ->where(function ($query) {
                    $query->where('student_test_result.is_latest', 1)
                        ->orWhereNull('student_test_result.is_latest');
                })->get();
              
//echo "<pre>";
//print_r($topics);
//echo"</pre>";
//exit;
               //->where('student_test_result.is_latest' , 1) 
             //  >orWhereNull('student_test_result.is_latest')
               
       // dd(DB::getQueryLog());
        return view( 'topics.view_topics',compact('topics','course_id' ) );
    }
	
	public function studentTopics($course_id){
		 DB::enableQueryLog();

        $user_id = Auth::user()->user_id; 
       $topics = CourseTopics::
                 
               Join('student_courses', 'student_courses.course_idFK', '=', 'course_topics.course_idFK')
               ->Join('users', 'users.user_id', '=', 'student_courses.student_idFK')
               ->where('course_topics.course_idFK',$course_id)
               ->where('users.user_level', Auth::user()->user_level)
               ->where('course_topics.topic_level_id',Auth::user()->user_level)
               //->where('course_topics.topic_level_id', '=','student_test_result.level_id')
               // ->where(function ($query) 
               //         {
               //              $query->where('student_test_result.is_latest', 1)
               //                    ->orWhereNull('student_test_result.is_latest');
               //          })
               ->get();
                
/*echo "<pre>";
print_r($topics);
echo"</pre>";
exit;*/
               //->where('student_test_result.is_latest' , 1) 
             //  >orWhereNull('student_test_result.is_latest')
               
       // dd(DB::getQueryLog());
        return view('topics.studentindex',compact('topics','course_id' ) );
	}
    public function topicActivitiesList($topic_id)
    { 
       $user_id = Auth::user()->user_id;
//       $activities = CourseTopicActivities::where('topic_idFK',$topic_id)->get();
       $activities = CourseTopicActivities::where('topic_idFK',$topic_id)->paginate(30);
      // dd($activities);
        return view( 'topics.topic_activities_list',compact('activities', 'topic_id' ) );
    }
    public function topicActivityDetails($topic_id)
    { 
  //$topic_id = 1;
        $user_id = Auth::user()->user_id;
     //  $activities = CourseTopicActivities::where('activity_id',$activity_id)->first();
        $activities = CourseTopicActivities::where('topic_idFK',$topic_id)->simplePaginate(1);
        
    
        return view( 'topics.topic_activity_details',compact('activities','topic_id' ) );
    }
	
	public function topicStudentActivityDetails($topic_id)
    { 
  //$topic_id = 1;
        $user_id = Auth::user()->user_id;
     //  $activities = CourseTopicActivities::where('activity_id',$activity_id)->first();
        $activities = CourseTopicActivities::where('topic_idFK',$topic_id)->simplePaginate(1);
        
    
        return view( 'topics.topic_activity_details',compact('activities','topic_id' ) );
    }
   
 public function topicAddTopic($course_id){
	 return view('topics.add_topic', compact('course_id'));
 }
 
 public function topicSaveTopic($course_id, Request $request){
	$post = $request->all();
	$user_id = Auth::user()->user_id;
	$topics = CourseTopics::select('topic_level_id')->where('course_idFK',$course_id)->orderBy('topic_level_id', 'DESC')->get();
	if($topics->isNotEmpty($topics))
		$current_topiclevel_id = $topics[0]->topic_level_id + 1;
	else 
		$current_topiclevel_id = 1;
		
	$input['topic_name'] = $post['topictitle'];
	$input['topic_text'] = $post['topicdesc'];
	$input['course_idFK'] = $course_id;
	$input['topic_level_id'] = $current_topiclevel_id;
	$input['created_by'] = $user_id;
	$input['created_at'] = Carbon::now()->toDateTimeString();
	CourseTopics::create($input);
	return redirect()->route('topic.addtopic', $course_id)->with('success', 'Topic added successfully');
 }
 public function topicAdditem($topic_id)
 {
    $activities = CourseTopicActivities::pluck("activity_name", "activity_id")->toArray();
	return view('topics.add_items', compact('topic_id', 'activities'));
 }
 
 public function topicSaveItem(Request $request)
 {
	$post                      = $request->all();
	$user_id                   = Auth::user()->user_id;
	$topic_id                  = $post['topic_id'];
	$course_id                 = CourseTopics::select('course_idFK')->where('topic_id',$topic_id)->get();	
	$input['question_text']    = $post['question'];
	$input['answer_1']         = $post['option1'];
	$input['answer_2']         = $post['option2'];
	$input['answer_3']         = $post['option3'];
	$input['answer_4']         = $post['option4'];
	$input['correct']          = $post['correctoption'];
	$input['type_of_assessment']   = $post['assessmenttype'];
	$input['topic_idFK']           = $post['topic_id'];
	$input['course_idFK']          = $course_id[0]->course_idFK;
	$input['created_by']           = $user_id;
	$input['created_at']           = Carbon::now()->toDateTimeString();
    $input['activity_idFK']        = $post['activity_id'];
    $input['weightage']            = $post['contentlevelValue'];
    $input['levels']               = $post['contentlevel'];
    

	AssessmentTest::create($input);

	return redirect()->route('topic.additem', $topic_id)->with('success', 'Question added successfully');
 }

 public function topicListItem($topic_id)
 {
    $questions = CourseTopicActivities::where(["topic_idFK" => $topic_id])->get();
    
    //$query = CourseTopicActivities::where(["topic_idFK" => $topic_id]);
    // echo "<pre>";
    // print_r($query->toSql());
    // print_r($query->getBindings());
    // die();

    //echo $questions; die();
    return view('topics.view_questions', compact('topic_id', 'questions'));
 }
 

}
