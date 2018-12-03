<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class UploaderController extends Controller
{
    //2018-12-2
    public function webuploader(Request $request) {
        //判断用户是否有文件上传 并且文件上传没有错误
       if ($request->hasFile('file') && $request->file('file')->isValid()) {
           //40位时间格式 获取文件名称和后缀 组成新文件名
           $filename = sha1(time().$request->file('file')->getClientOriginalName()).'.'.$request->file('file')->getClientOriginalExtension();
           Storage::disk('public')->put($filename,file_get_contents($request->file('file')->path()));
           $result = [
               'errCode'    =>  '0',
               'errMsg'     =>  '',
               'succMsg'    =>  '文件上传成功',
               'path'       =>  '/storage/'.$filename,
           ];
       }else{
           $result = [
               'errCode'    =>  '00001',
               'errMsg'       =>  $request->file('file')->getErrorMessage(),
           ];
       }
       return response()->json($result);
    }
}
