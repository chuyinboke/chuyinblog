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
// 用户无刷新删除
Route::get('/admin/user/destory','Admin\UserController@destroy');
// 用户的增删改查路由
Route::resource('/admin/user','Admin\UserController');
// 分类的无刷新删除
Route::get('/admin/cate/destory','Admin\CategoryController@destroy');
 // 分类的增删改查路由
 Route::resource('/admin/cate','Admin\CategoryController');
 // 公告的无刷新删除
Route::get('/admin/notice/destory','Admin\NoticeController@destroy');
 // 公告的路由
 Route::resource('/admin/notice','Admin\NoticeController');
// 网站配置
Route::resource('/config','Admin\ConfigController');
// 点击退出，删除管理员session
Route::get('/deladmin','Admin\IndexController@del');
// 回收站用户的无刷新删除
Route::get('/recycle/destory','Admin\RecycleController@destroy');
// 回收站用户列表
Route::resource('/recycle','Admin\RecycleController');
// 恢复被删除的用户数据
Route::resource('/restore','Admin\RecycleController');
// 回收站文章的无刷新删除
Route::get('/recyclewz/destory','Admin\RecyclewzContRoller@destroy');
// 回收站文章列表
Route::resource('/recyclewz','Admin\RecyclewzContRoller');





































//文章的路由
Route::resource('/admin/article','Admin\ArticleConteoller');
//友情链接的路由
Route::resource('/admin/links','Admin\linksController');
//轮播图的路由
Route::resource('/admin/rotation','Admin\rotationController');
//前台申请友情链接路由
Route::resource('/admin/homelinks','Admin\homelinksController');
//相册的路由
Route::resource('/admin/album','Admin\albumController');
//评论管理的路由
Route::resource('/admin/comment','Admin\commentController');
//博主简介的路由
Route::resource('/admin/Blogger','Admin\BloggerController');










































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
// 个人中心的删除
Route::get('/person/delete','Home\PersonController@destroy');
// 个人中心路由
Route::resource('/person','Home\PersonController');
// 其他博主的个人中心
Route::get('person/bloggercenter/{id}','Home\PersonController@bloggercenter');
// 分类路由
Route::resource('/cate','Home\CateController');
// 查看文章详情路由
Route::get('/cate/shows/{id}','Home\CateController@shows');
// 发表帖子路由
Route::resource('/publish','Home\PublishController');

}else{

	// 网站维护状态
	Route::get('/home','Home\IndexController@modify');
}














// 前台路由
//前台添加友情链接路由啊
Route::resource('/links','Home\linksController');






























