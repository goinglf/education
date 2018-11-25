<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    //登陆2018-11-17
    public function login() {
        return view('admin.public.login');
    }
    //登陆校验
    public function check(Request $request) {
        $this->validate($request,[
           'username'   =>  'required|min:2|max:20',
            'password'  =>  'required|min:6',
            'captcha'   =>  'required|size:5|captcha'
        ]);
        $data = $request->only(['username','password']);
        $data['status'] = 2;//状态为2是启用
        //使用门面验证用户，省略了自己去查数据库
        $result = Auth::guard('admin')->attempt($data,$request->get('online'));
        if ($result) {
            return redirect('/admin/index/index');
        }else {
            return redirect('/admin/public/login')->withErrors([
               'loginError' => '用户名或者密码错误'
            ]);
        }
    }
    //登陆退出2018-11-18
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/admin/public/login');
    }
}
