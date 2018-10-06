<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportToKa extends Model
{
    protected $guarded = ['id'];
    protected $table = 'report_to_kas';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
