<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = ['id'];
    protected $table = 'activities';


    public function users(){

    	return $this->belongsTo(User::class, 'users','id');
    }
}
