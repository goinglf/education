<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'course';

    //关联专业，一对一
    public function profession(){
        return $this->hasOne('App\Admin\Profession','id','profession_id');
    }
}
