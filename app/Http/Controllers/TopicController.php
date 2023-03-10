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
use Phpml\Classification\KNearestNeighbors;


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
		DB::enableQueryLog();
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

    function get_range($level)
    {
        $range = array(1,25);

        switch($level)
        {
            case 1: $range = array(1,25); break;
            case 2: $range = array(26,50); break;
            case 3: $range = array(51,75); break;
            case 4: $range = array(76,100); break;
        }

        return $range;
    }
	
	public function studentTopics($course_id){
		 DB::enableQueryLog();

         

        $user_id = Auth::user()->user_id; 
       $topics = CourseTopics::
                 leftJoin('student_test_result', 'student_test_result.topic_idFK', '=', 'course_topics.topic_id')
               ->Join('student_courses', 'student_courses.course_idFK', '=', 'course_topics.course_idFK')
               ->Join('users', 'users.user_id', '=', 'student_courses.student_idFK')
               ->where('course_topics.course_idFK',$course_id)
               ->where('users.user_level', Auth::user()->user_level)
               ->where('course_topics.topic_level_id',Auth::user()->user_level)
              // ->where('course_topics.topic_level_id', '=','student_test_result.level_id')
               ->where(function ($query) 
                       {
                            $query->where('student_test_result.is_latest', 1)
                                  ->orWhereNull('student_test_result.is_latest');
                        })
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
        //$activities = CourseTopicActivities::where('topic_idFK',$topic_id)->simplePaginate(1);

        ///////////////////////////////////// AI ///////////////////////////////////////////////
         $user_level     = Auth::user()->user_level; //echo $user_level;
         $user_weightage = Auth::user()->user_weightage; //echo $user_weightage;

         $range_exploded = $this->get_range($user_level); #get range from user level

         $activity_set  = CourseTopicActivities::where('topic_idFK',$topic_id)
                           ->where('content_level_value','>=', $range_exploded[0]) #range starts
                           ->where('content_level_value','<=', $range_exploded[1]) #range end
                           ->get();

        if(!empty($activity_set))
        {
            $sample_data = array();
            $labels      = array();

            foreach($activity_set as $act)
            {
                $sample_data[] = array($user_weightage, $act->content_level_value);
                $labels[]      = $act->activity_id;
            }

            $samples = $sample_data;

            $activity_nearest_id = array();
            
//echo  sizeof($samples)." => ".sizeof($labels); //die();
            //echo "<pre>"; print_r($samples); die();
            for($loop=1; $loop<=5; $loop++)
            {
                $classifier = new KNearestNeighbors($loop);
                $classifier->train($samples, $labels);

                $activity_nearest_id[] =  $classifier->predict([$user_weightage, $user_weightage+$loop]);
            }
//print_r(array_unique($activity_nearest_id)); die();
            $activities = CourseTopicActivities::whereIn('activity_id', array_unique($activity_nearest_id))
                         ->simplePaginate(1);
                         //->get();
//die($activities);

        }

         /////////////////////////////////////////////////////////////////////////////////////////
        
    
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
