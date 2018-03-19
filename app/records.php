<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class records extends Model
{
    //
    public  function course(){
        return $this->belongsTo(course::class,'course_id');
    }
}
