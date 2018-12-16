<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';

    public function paper(){
        return $this->hasOne('App\Admin\Paper','id','paper_id');
    }
}
