<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Auth;
use App\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class RoleController extends Controller
{
    public function index() {
        $data = Role::get();
        return view('admin.role.index',compact('data'));
    }
    //权限分配
    public function assign() {
        if (Input::method() =='POST') {
            $data = Input::only(['id','auth_id']);
            $role = new Role();
            return $role->assignAuth($data);
        }else{
            $top = Auth::where('pid','0')->get();
            $cat = Auth::where('pid','!=','0')->get();
            $ids = Role::where('id',Input::get('id'))->value('auth_id');
            return view('admin.role.assign',compact('top','cat','ids'));
        }
    }
}
