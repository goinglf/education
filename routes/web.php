<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('public/login','Admin\PublicController@login')->name('login');
    Route::get('public/logout','Admin\PublicController@logout');
    Route::post('public/check','Admin\PublicController@check');
});
//Route::group(['prefix' => 'admin','middleware' => ['admin']],function () {
Route::group(['prefix' => 'admin','middleware' => ['auth:admin','checkrbac']],function () {
    Route::get('index/index','Admin\IndexController@index');
    Route::get('index/welcome','Admin\IndexController@welcome');
    Route::get('manager/index','Admin\ManagerController@index');//管理员列表
    Route::get('auth/index','Admin\AuthController@index');//权限列表
    Route::any('auth/add','Admin\AuthController@add');//权限添加
    Route::get('role/index','Admin\RoleController@index');//角色的展示
    Route::any('role/assign','Admin\RoleController@assign');//角色权限分配
    //会员的管理模块
    Route::get('member/index','Admin\MemberController@index');//列表
    Route::any('member/add','Admin\MemberController@add');//添加
    Route::post('uploader/webuploader','Admin\UploaderController@webuploader');//异步上传
    Route::get('member/getareabyid','Admin\MemberController@getAreaById');//ajax联动

    //专业课程
    Route::get('protype/index','Admin\ProtypeController@index');//专业列表
    Route::get('profession/index','Admin\ProfessionController@index');//课程列表
});