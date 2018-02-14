<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $guarded = ['id'];
    protected $table = 'goals';

    public function users(){

    	return $this->belongsTo(User::class, 'users','id');
    }
}
