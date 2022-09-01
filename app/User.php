<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'rol_id'
    ];
    
    public function activities(){
        return $this->belongsToMany('App\Activity', 'users_activities');
    }

    public function projects(){
        return $this->belongsToMany('App\Project', 'users_projects');
    }

    public function roles(){
        return $this->hasOne('App\Rol');
    }
}
