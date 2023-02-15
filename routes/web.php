<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

  Route::prefix('teachers')->group(function () {
            Auth::routes([
             'register' => true, // Registration Routes...
             'reset' => false, // Password Reset Routes...
             'verify' => false, // Email Verification Routes...
           ]);
           
  });
  Route::prefix('student')->group(function () {
         Route::get('/register-student', 'Auth\RegisterController@showStudentsRegistrationForm')->name('register-student');

          
  });

 
  # with auth teachers
  Route::group([
                    'prefix' => 'teachers',
                    'middleware' => 'auth'
              ], function() 
              {
                  Route::get('/teacher/index', 'TeacherController@index')->name('teacher.index'); 
                  Route::get('/teacher/student/list', 'TeacherController@studentList')->name('teacher.student.list'); 
                  
                  Route::get('/teacher/course', 'TeacherController@teacherCoursesList')->name('teacher.course');
                  Route::get('/teacher/profile', 'TeacherController@teacherProfile')->name('teacher.profile');
        		      Route::get('/teacher/addcontent/{topic_id}', 'TeacherController@teacherAddContent')->name('teacher.addcontent');
        		      Route::post('/teacher/savecontent/', 'TeacherController@teacherSaveContent')->name('teacher.savecontent');
                  Route::post('/teacher/update/{id}', 'TeacherController@teacherProfileUpdate')->name('teacher.updates');
        		      Route::get('/teacher/createcourse', 'TeacherController@teacherCreateCourse')->name('teacher.createcourse');
        		      Route::post('/teacher/addcourse', 'TeacherController@teacherAddCourse')->name('teacher.addcourse');
            });

  # with auth Students
  Route::group([
                    'prefix' => 'student',
                    'middleware' => 'auth'
              ], function() 
              {
                   Route::get('/student/index', 'StudentController@index')->name('student.index');
                   Route::get('/student/assessment/test', 'StudentController@assessmentTest')->name('student.assessment.test');
                   Route::post('/save/assessment', 'StudentController@assessmentSave')->name('save.assessment');
                   
                  Route::get('/student/course/selection', 'StudentController@courseSelection')->name('student.course.selection');
                  Route::get('/student/course/enrollment/{course_id}', 'StudentController@courseEnrollment')->name('student.course.enrollment');
                  Route::get('/my/course', 'StudentController@myCourse')->name('my.course');
                 
                  Route::get('/course/studenttopics/{course_id}', 'TopicController@studentTopics')->name('course.studenttopics');
                  Route::get('/course/topics/{course_id}', 'TopicController@index')->name('course.topics');
                  Route::get('/topic/activities/{topic_id}', 'TopicController@topicActivitiesList')->name('topic.activities');
				          Route::get('/topic/addtopic/{course_id}', 'TopicController@topicAddTopic')->name('topic.addtopic');
				          Route::post('/topic/savetopic/{course_id}', 'TopicController@topicSaveTopic')->name('topic.savetopic');

                  Route::get('/topic/additem/{topic_id}', 'TopicController@topicAddItem')->name('topic.additem');
                  Route::get('/topic/listitem/{topic_id}', 'TopicController@topicListItem')->name('topic.listitem');

				          Route::post('/topic/saveitem/', 'TopicController@topicSaveItem')->name('topic.saveitem');
				          Route::get('/activity/{activity_id}', 'TopicController@topicActivityDetails')->name('topic.activity');
                  Route::get('/studentactivities/{topic_id}', 'TopicController@topicStudentActivityDetails')->name('topic.studentactivities');
                  
                  #pre test
                  Route::get('/course/topics/test/{type}/{topic_id}', 'StudentController@studentTest')->name('course.topics.test');
                  Route::get('/course/topics/result/{test_result_id}', 'StudentController@studentTestResult')->name('course.topics.result');
          });


Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
  
  Route::get('/user/delete/{user_id}', 'UserController@destroy')->name('users.delete');
  
  Route::get('admin/dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('change-password', 'ChangePasswordController@index')->name('changepassword');
  Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

});

// Route::group(['namespace' => 'Tests', 'prefix' => 'test', 'as' => 'test.'], function () {
//   include_route_files(__DIR__.'/test/');
// });

