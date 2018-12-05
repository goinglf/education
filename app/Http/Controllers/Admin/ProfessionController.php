<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Profession;
class ProfessionController extends Controller
{
    //2018-12-5
    public function index(){
        $data = Profession::orderBy('sort','desc')->get();
        return view('admin.Profession.index',compact('data'));
    }
}
