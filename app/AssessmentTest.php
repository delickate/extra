<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentTest extends Model 
{
    //use HasMediaTrait;
    protected $table = 'student_assessment_test';
    
    protected $primaryKey = 'question_id';
    
    protected $guarded = [];

    protected $fillable = [
        'weightage',
    ];


    function notifications(){
//        return $this->hasMany('App\Notification', 'user_idFk', 'student_id');
    }
    
   

}
