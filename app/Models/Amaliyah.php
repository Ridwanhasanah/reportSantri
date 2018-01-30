<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amaliyah extends Model
{
    protected $guarded = 'id';
    protected $table   = 'amaliyahs';
    public $timestamps = false;

    public function users(){
        
        return $this->belongsTo(User::class, 'users', 'id'); 
    }
} 
