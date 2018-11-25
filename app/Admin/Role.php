<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    public $timestamps = false;//禁用时间

    //将分配的权限存入库中
    public function assignAuth($data) {
        $result['auth_id'] = implode(',',$data['auth_id']);
        $tmp = Auth::where('pid','!=','0')->whereIn('id',$data['auth_id'])->get();
        $ac = '';
        foreach ($tmp as $k => $v) {
            $ac .= $v->controller.'@'.$v->action.',';
        }
        $result['auth_ac'] = strtolower(rtrim($ac,','));
        return self::where('id',$data['id'])->update($result);
    }
}
