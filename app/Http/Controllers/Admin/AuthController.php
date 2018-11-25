<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;

class AuthController extends Controller
{
    //权限列表 2018-11-18
    public function index() {
        $data = DB::table('auth as t1')->select('t1.*','t2.auth_name as parent_name')
                ->leftJoin('auth as t2','t1.pid','=','t2.id')->get();
        return view('admin.auth.index',compact('data'));
    }
    //权限添加 2018-11-18
    public function add() {
        if (Input::method() == 'POST') {
           $data = Input::except('_token');//忽略token字段
           $result = Auth::insert($data);
           return $result?'1':'0';
        }else{
            $parents = Auth::where('pid','0')->get();
            return view('admin.auth.add',compact('parents'));
        }
    }

}
