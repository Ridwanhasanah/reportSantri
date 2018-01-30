<?php

namespace App\Models;

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
    protected $guarder = ['id'];

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
        return $this->hasMany(Models\Goal::class, 'goals');
    }

    /*Realtion Many to manty User - activity*/
    public function activities(){
        return $this->hasMany(Models\Activity::class);//, 'activities');
    }

    /*Realtion Many to manty User - amaliyah*/
    public function amaliyah(){
        return $this->hasMany(Models\Amaliyah::class, 'amaliyahs');
    }


}
