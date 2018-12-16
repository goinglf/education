<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Paper;

class PaperController extends Controller
{
    public function index(){
        $data = Paper::get();
        return view('admin.paper.index',compact('data'));
    }
}
