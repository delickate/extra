<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{

    protected $table = 'roles';

    protected $fillable = [
        'name', 'display_name', 'description',
    ];

    protected $dates = ['created_at', 'updated_at'];
    
//    public function users()
//    {
//        return $this->belongsToMany(User::class);
//    }

}