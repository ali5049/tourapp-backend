<?php

namespace practise;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','company','body','departure','days','price'];
    public function user(){
        return $this->belongsTo('practise\User');
    }
}
