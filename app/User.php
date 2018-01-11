<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'address',
        'hp',
        'date_birth',
        'place_birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*Realtion Many to manty User - goal*/
    public function goals(){
        return $this->belongsToMany(Models\Goal::class, 'goal_users');
    }

    /*Realtion Many to manty User - activity*/
    public function activities(){
        return $this->belongsToMany(Models\Activity::class, 'activity_users');
    }


}
