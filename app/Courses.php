<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use App\CourseLevels;

class Courses extends Model 
{
    //use HasMediaTrait;
    protected $table = 'courses';
    
    protected $primaryKey = 'course_id';
    
    //protected $with = ['district'];
    protected $guarded = [];

    
    
     function students()
    {
        return $this->hasMany('App\StudentCourses', 'course_idFK', 'course_id');
    }
    
     function levels()
    {
        return $this->hasMany('App\CourseLevels', 'level_id', 'level_id');
    }
     function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'user_id');
    }
    
    
    function notifications(){
//        return $this->hasMany('App\Notification', 'user_idFk', 'student_id');
    }
    
        Static function getStudentCourses($user_id){
            $query = Courses::select('courses.*')->join('registered_students', 'registered_students.course_level', '>=', 'courses.level_id');
            $query = $query->where('registered_students.user_idFK', $user_id);
            return $query->get();
    }
    
   

}
