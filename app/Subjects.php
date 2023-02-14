<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = 'subjects';
    
    protected $primaryKey = 'subject_id';
    


    function users()
    {
        return $this->hasMany('App\User');
    }



}
