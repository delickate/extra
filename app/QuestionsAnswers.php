<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsAnswers extends Model
{
    protected $table = 'questions_answers';

     protected $primaryKey = 'qna_id';

     public $timestamps = false;

    protected $fillable = [
       
    ];

   // protected $dates = ['created_at', 'updated_at'];
    
}
