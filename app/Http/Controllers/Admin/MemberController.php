<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

        }else{
//            $data = DB::table('area')->where('pid',0)->get();
            return view('admin.member.add',compact('data'));
        }

    }
}
