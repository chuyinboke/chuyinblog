<?php
use App\model\Config;
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
// 后台路由登陆
Route::get('/admin','Admin\IndexController@login');
// 登录验证
Route::post('/admin/do','Admin\IndexController@dologin');
// 成功进入后台
Route::get('/admin/index','Admin\IndexController@index');
// 用户的增删改查路由
 Route:resource('/admin/user','Admin\UserController');
 // 分类的增删改查路由
 Route::resource('admin/cate','Admin\CategoryController');
 // 公告的路由
 Route::resource('admin/notice','Admin\NoticeController');
// 网站配置
Route::resource('/config','Admin\ConfigController');
// 点击退出，删除管理员session
Route::get('/deladmin','Admin\IndexController@del');
// 回收站用户列表
Route::resource('/recycle','Admin\RecycleController');
// 恢复被删除的用户数据
Route::resource('/restore','Admin\RecycleController');
// 回收站文章列表
Route::resource('/recyclewz','Admin\RecyclewzContRoller');





































//后台文章的路由
Route::resource('/admin/article','Admin\ArticleConteoller');
//后台友情链接的路由
Route::resource('/admin/links','Admin\LinksController');
//后台轮播图的路由
Route::resource('/admin/rotation','Admin\RotationController');
//前台申请友情链接路由
Route::resource('/admin/homelinks','Admin\HomelinksController');
//后台相册的路由
Route::resource('/admin/album','Admin\AlbumController');
//后台评论管理的路由
Route::resource('/admin/comment','Admin\CommentController');
//后台博主简介的路由
Route::resource('/admin/Blogger','Admin\BloggerController');
//后台留言板的路由
Route::resource('/admin/Leaving','Admin\LeavingController');









































$config =Config::find(1);
if($config['status'] == 1){
	//前台开始
Route::get('/home','Home\IndexController@Index');
// 注册路由
Route::resource('/login','Home\LoginController');
// 登陆路由
Route::resource('/loginuser','Home\LoginuserController');
// 退出。删除session 路由
Route::get('/del','Home\LoginuserController@del');
// 个人中心路由
Route::resource('/person','Home\PersonController');
// 分类路由
Route::resource('/cate','Home\CateController');
// 查看文章详情路由
Route::get('/cate/shows/{id}','Home\CateController@shows');
// 发表帖子路由
Route::resource('/publish','Home\PublishController');
//前台路由
//前台添加友情链接路由啊
Route::resource('/links','Home\LinksController');
//前台的评论列表
Route::resource('/comment','Home\commentController');
//留言板的路由
Route::resource('/Leaving','Home\LeavingController');
}else{

	// 网站维护状态
	Route::get('/home','Home\IndexController@modify');
}


//不必登陆的
//前台博主简介的路由
Route::resource('/Blogger','Home\BloggerController');










































