<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class StudentCourses extends Model 
{
    //use HasMediaTrait;
    protected $table = 'student_courses';
    
    protected $primaryKey = 'student_courses_id';
    
    //protected $with = ['district'];
    protected $guarded = [];

    function notifications(){
//        return $this->hasMany('App\Notification', 'user_idFk', 'student_id');
    }
    
    
   

}
