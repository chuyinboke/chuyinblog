<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 后台路由开始
Route::get('/admin','Admin\IndexController@index');
// 用户的增删改查路由
 Route:resource('/admin/user','Admin\UserController');
 // 分类的增删改查路由
 Route::resource('admin/cate','Admin\CategoryController');
 // 公告的路由
 Route::resource('admin/notice','Admin\NoticeController');









































//文章的路由
Route::resource('/admin/article','Admin\ArticleConteoller');
//友情链接的路由
Route::resource('/admin/links','Admin\linksController');
//轮播图的路由
Route::resource('/admin/rotation','Admin\rotationController');




















































//前台开始
Route::get('/home','Home\IndexController@Index');





















// 前台路由
