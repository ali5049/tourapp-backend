<?php

namespace practise;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function posts(){
        return $this->hasMany('practise\Post');
    }
}
