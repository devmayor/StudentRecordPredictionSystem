<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    //
    public function record(){
        return $this->hasOne(records::class,'matric_id');
    }
    public function records(){
        return $this->hasMany(records::class,'matric_id');
    }
}
