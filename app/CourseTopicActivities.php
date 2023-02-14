<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTopicActivities extends Model
{
    protected $table = 'topic_activities';
    
    protected $primaryKey = 'activity_id';
    
	protected $guarded = [];

}
