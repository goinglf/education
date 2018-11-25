<?php

namespace App\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    //定义当前表
    protected $table = 'manager';
    use Authenticatable;
    //关联角色模型 2018-11-18
    public function role() {
        return $this->hasOne('App\Admin\Role','id','role_id');
    }
}
