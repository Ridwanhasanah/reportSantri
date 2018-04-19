<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $guarded = ['id'];
    protected $table = 'motors';
    public $timestamps = false;

    public function users(){

    	return $this->belongsTo(User::class, 'users','id');
    }
}
