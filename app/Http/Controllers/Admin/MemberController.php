<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MemberController extends Controller
{
    //会员列表 2018-11-25
    public function index() {
        $data = Member::get();
        return view('admin.member.index',compact('data'));
    }

    //会员添加 2018-11-25
    public function add() {
        if (Input::method() == 'POST') {
            $result = Member::insert([
                'username'  =>  Input::get('username'),
                'password'  =>  bcrypt('123456'),
                'gender'    =>  Input::get('gender'),
                'mobile'    =>  Input::get('mobile'),
                'email'     =>  Input::get('email'),
                'avatar'    =>  Input::get('avatar'),
                'province_id'=> Input::get('province_id'),
                'city_id'   =>  Input::get('city_id'),
                'county_id' =>  Input::get('county_id'),
                'type'      =>  Input::get('type'),
                'status'    =>  '2',//启用
                'created_at'=>  date('Y-m-d H:i:s'),
            ]);
            return $result?1:0;
        }else{
            $country = DB::table('area')->where('pid',0)->get();
            return view('admin.member.add',compact('country'));
        }

    }
    //获取地区信息 2018-11-27
    public function getAreaById() {
        $id = Input::get('id');
        $data = DB::table('area')->where('pid',$id)->get();
        return response()->json($data);//返回Jason的格式
    }
}
