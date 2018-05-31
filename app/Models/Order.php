<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];
    protected $table = 'orders';


    public function user(){

    	return $this->belongsTo(User::class);//, 'users','id');
    }
}
