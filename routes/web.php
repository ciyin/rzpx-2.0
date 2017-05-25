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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//middleware:检测用户是否有登录。登录了才能访问以下的路由，若未登录，返回登录页面。
Route::group(['middleware'=>'auth'],function (){
    Route::resource('user','UserController');//用户管理
    Route::resource('role','RoleController');//角色管理
    Route::resource('type','VideoTypeController');//视频分类
    Route::resource('video','VideoController');//视频
    Route::resource('training','RoleVideoController');//培训内容
    Route::resource('log','LogController');//培训记录
});
