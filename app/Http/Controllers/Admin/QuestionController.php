<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Question;
use Excel;
use Illuminate\Support\Facades\Input;

class QuestionController extends Controller
{
    public function index(){
        $data = Question::get();
        return view('admin.question.index',compact('data'));
    }

    //导出
    public function export(){
        //表头
        $cellData = [
            ['序号','题干','所属试卷','分值','选项','正确答案','添加时间']
        ];
        $data = Question::all();
        //循环写入
        foreach ($data as $k => $v) {
            $cellData[] = [
              $v->id,
              $v->question,
              $v->paper->paper_name,
              $v->score,
              $v->options,
              $v->answer,
              $v->created_at
            ];
        }

        //使用excel 参数1是文件名称
        Excel::create(sha1(time().rand(1000,9999)),function($excel) use ($cellData){
           $excel->sheet('题库',function ($sheet) use ($cellData){
              $sheet->rows($cellData);
           });
        })->export('xls');

    }
    //导入
    public function import(){
        if (Input::method() == 'get') {
            $data = Question::get();
            return view('admin.question.import',compact('data'));
        }else{
            $filePath = '.'.Input::get('excelpath');
            Excel::load($filePath,function ($reader){
               $data = $reader->getSheet(0)->toArry();
               $temp=[];
                //循环写入
                foreach ($data as $k => $v) {
                    if($k == '0'){
                        continue;
                    }
                    $temp[] = [
                        'question'  =>  $v[0],
                        'paper_id'  =>  Input::get('paper_id'),
                        'score'     =>  $v[3],
                        'option'    =>  $v[1],
                        'answer'    =>  $v[2],
                        'created_at'=>  date('Y-m-d H:i:s')
                    ];
                }
                //插入数据库
                $result = Question::insert($temp);
                echo $result ? '1':'0';
            });
        }

    }
}
