<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTopics extends Model
{
	protected $guarded = [];
    protected $table = 'course_topics';
    
    protected $primaryKey = 'topic_id';
	
}
