<?php

namespace App;


use Auth;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    
    protected $primaryKey = 'notification_id';
    
    protected $guarded = [];
    
    function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'user_id');
    }
    
    function createdFor()
    {
        return $this->belongsTo('App\User', 'created_for', 'user_id');
    }
    
    function company(){
        return $this->belongsTo('App\Company' , 'company_idFk', 'company_id');
    }
    
    protected  function unreadNotificationCount(){
        
        $user_id = Auth::user()->user_id;
        $notification_query = Notification::select('*');
        $notification_query->where('created_for','=',$user_id);
        $unread_notification_count = (int) $notification_query->where('is_read','=',"0")->count();
        return $unread_notification_count;
    }
    
    protected  function notificationCount(){
        
        $user_id = Auth::user()->user_id;
        $notification_query = Notification::select('*');
        $notification_query->where('created_for','=',$user_id);
        $total_notification_count = (int) $notification_query->count();
        return $total_notification_count;
    }
    
    protected  function allNotification(){
        
        $user_id = Auth::user()->user_id;
        $notification_query = Notification::select('*');
        $notification_query->where('created_for','=',$user_id);      
        $notification_query->orderBy('notification_id','Desc');
        $notification_query->limit(10);
        $notifications = $notification_query->get();
        return $notifications;
    }
    
}
