<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
   protected $table = 'profession';

   //一对一
    public function protype(){
        return $this->hasOne('App\Admin\Protype','id','protype_id');
    }
}
