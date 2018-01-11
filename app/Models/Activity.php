<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = ['id'];
    protected $table = 'activities';


    public function users(){

    	return $this->belongsToMany(User::class, 'activity_users', 'activity_id','user_id');
    }
}
