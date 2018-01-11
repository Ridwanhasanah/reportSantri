<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoalUser extends Model
{
    protected $table = 'goal_users';
    protected $fillable = ['goal_id', 'user_id'];

    public $timestamps = false;
}
