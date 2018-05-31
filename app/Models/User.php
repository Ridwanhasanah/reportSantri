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
    protected $table = 'users';
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
        return $this->hasMany(Activity::class);//, 'activities');
    }

    /*Realtion Many to manty User - amaliyah*/
    public function amaliyah(){
        return $this->hasMany(Models\Amaliyah::class, 'amaliyahs');
    }

    /*Realtion Many to manty User - order*/
    public function orders(){
        return $this->hasMany(Order::class);//, 'activities');
    }

    public function roles(){
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id');
        
    }

    // public function hasAnyRole($roles){

    //     if (is_array($roles)) {
    //         foreach ($$role as $role) {
    //             if ($this->hasRole($role)) {
    //                 return true;
    //             }
    //         }
    //     }else{
    //         if ($this->hasRole($role)) {
    //                 return true;
    //             }
    //     }

    //     return false;
    // }

    /*Ini di gunakan untuk check Role user apakah admin - master dll*/
    public function hasRole($role){

        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }
}
