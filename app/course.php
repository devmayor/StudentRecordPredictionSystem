<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    //

    public function record(){
        return $this->hasOne(records::class,'course_id');
    }

}
