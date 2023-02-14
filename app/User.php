<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    
    protected $table = 'users';
    
    protected $primaryKey = 'user_id';
    
    protected $with = ['district'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


//    function scopeDepartment($query)
//    {
//        return $query->where('district_id', '!=', '')
//            ->orWhereNotNull('district_id');
//    }

//    function scopeNotDeleted($query)
//    {
//        return $query->where('is_deleted', 0);
//    }

    function companies()
    {
        return $this->hasMany('App\Company','created_by','user_id');
    }

    function district()
    {
        return $this->belongsTo('App\District','district_id');
    }


//    public function getLoginToGmsAttribute()
//    {
//        // return "";
//
//
//        if($this->hasRole('admin') || $this->hasRole('super-admin') ):
//            $key = "AFBE8E888931B37BEF2C336984CF8";
//            $url = "https://pg.swd.punjab.gov.pk/user/link_login?e=".base64_encode($this->email)."&k=".base64_encode($key);
//            return '<a href="'.$url.'" class="nav-item nav-link" target="_blank">Login to GMS</a>';
//        endif;
//
//        return "";
//
//    }



//    public function assigned_districts()
//    {
//        return $this->hasManyThrough(
//            'App\District', // 3rd modal/ final modal
//            'App\UserDistricts', // intermediate modal
//            'user_id', // Foreign key of 1st modal in intermediate
//            'id', // primary key of 3rd modal
//            'id', // primary key of 1st modal
//            'district_id' // Foreign key of 3rd modal in intermediate
//        );
//    }

//    public function assigned_panagah()
//    {
//        return $this->hasManyThrough(
//            'App\ShelterHome', // 3rd modal/ final modal
//            'App\UserShelterHomes', // intermediate modal
//            'user_id', // Foreign key of 1st modal in intermediate
//            'id', // primary key of 3rd modal
//            'id', // primary key of 1st modal
//            'panagah_id' // Foreign key of 3rd modal in intermediate
//        );
//    }

    public function isSuperAdmin(){
        return Auth::user()->hasRole('super-admin');
    }
    
    public function isCompanyAdmin(){
        return Auth::user()->hasRole('company');
    }
    
    public function isSpecialBranch(){
        return Auth::user()->hasRole('special-branch');
    }

    public function isDOM(){
        return Auth::user()->hasRole('dom');
    }

    public function isAdmin(){
        return Auth::user()->hasRole('admin');
    }

    public function isGuest(){
        return Auth::user()->hasRole('guest');
    }
    public function getUseridByRole($role_name){
        $user_query = User::select('*');
        $user_query->join("roles", 'roles.id', '=', 'users.role_idFk');      
        $user_query->where('roles.name','=',$role_name);      
        $user = $user_query->first();
        return $user->user_id;
    }
    
//    public function roles()
//    {
//        return $this->belongsToMany(Role::class);
//    }









}
