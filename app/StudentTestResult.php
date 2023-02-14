<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use App\CourseLevels;

class StudentTestResult extends Model 
{
    //use HasMediaTrait;
    protected $table = 'student_test_result';
    
    protected $primaryKey = 'test_result_id';
    
    //protected $with = ['district'];
    protected $guarded = [];

      function topic()
    {
        return $this->hasOne('App\CourseTopics', 'topic_id', 'topic_idFK');
    }
    

}
