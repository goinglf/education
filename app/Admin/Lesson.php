<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';
    //关联课程，一对一
    public function course(){
        return $this->hasOne('App\Admin\Course','id','course_id');
    }
}
