<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;

class IndexController extends Controller
{
    /**
     *  后台首页页面
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 后台首页
       return view('admin.index.index');
    }
    /**
     * 后台登陆页面
     */
    public  function login()
    {
        return view('admin.login.login');
    }
    /**
     * 后台登陆验证页面
     */
    public function dologin(Request $request)
    {
        $user =$request->input('username');
        session(['admin'=>$user]);
        $pw =$request->input('password');
        $res =User::where('username','=',$user)->first();
        $res2 =User::where('password','=',$pw)->first();
        if($res && $res2 && $res['status'] == 0){
             echo "<script>alert('登陆成功');location.href='/admin/index'</script>";
        }else{
               echo "<script>alert('登录失败，请重新登陆');location.href='/admin'</script>";
        }
    }
    /**
     * 退出时删除管理员用户session
     * 
     */
      public function del()
    {
        session(['admin'=>null]);
        return redirect('/home');
    }
  
}
