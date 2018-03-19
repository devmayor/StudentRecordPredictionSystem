<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semester extends Model
{
    public function course(){
        return $this->hasMany(course::class);
    }
}
