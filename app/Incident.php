<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'activity_id'
    ];

    public function activity(){
        return $this->belongsTo('App\Activity');
    }
}
