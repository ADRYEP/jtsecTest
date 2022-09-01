<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function activities(){
        return $this->hasMany('App\Activity');
    }
    
    public function users(){
        return $this->belongsToMany('App\User', 'users_projects');
    }
}
