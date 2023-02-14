<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    
    protected $primaryKey = 'district_id';
    
    function province()
    {
        return $this->belongsTo('App\Province');
    }

    function users()
    {
        return $this->hasMany('App\User');
    }

    function company()
    {
        return $this->hasMany('App\Company');
    }

    public function assigned_users()
    {
        return $this->hasManyThrough(
            'App\User', // 3rd modal/ final modal
            'App\UserDistricts', // intermediate modal
            'district_id', // Foreign key of 1st modal in intermediate
            'user_id', // primary key of 3rd modal
            'id', // primary key of 1st modal
            'user_id' // Foreign key of 3rd modal in intermediate
        );
    }

    function scopeOfPunjab($query)
    {
        return $query->where('province_id', 6);
    }



}
