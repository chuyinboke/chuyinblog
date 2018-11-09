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





































//文章的路由
Route::resource('/admin/article','Admin\ArticleConteoller');
//友情链接的路由
Route::resource('/admin/links','Admin\linksController');
//轮播图的路由
Route::resource('/admin/rotation','Admin\rotationController');















































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



}else{

	// 网站维护状态
	Route::get('/home','Home\IndexController@modify');
}














// 前台路由
