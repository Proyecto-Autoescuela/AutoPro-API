<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function teachers(){
        return $this->belongsTo('App\Teacher', 'teacher_id');
    }
}
