<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class RegisteredStudents extends Model 
{
    //use HasMediaTrait;
    protected $table = 'registered_students';
    
    protected $primaryKey = 'student_id';
    
    //protected $with = ['district'];
    protected $guarded = [];

    function notifications(){
//        return $this->hasMany('App\Notification', 'user_idFk', 'student_id');
    }
    
    function user()
    {
        return $this->belongsTo('App\User', 'user_idFK', 'user_id');
    }
    
    
     public function userStudents() {
    //    return $this->user()->where('users.role_idFK','=', 3);
    }
   

}
