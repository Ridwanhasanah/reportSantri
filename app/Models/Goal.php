<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $guarder = ['id'];
    protected $table = 'goals';

    public function users(){

    	return $this->belongsToMany(User::class, 'goal_users');
    }
}
