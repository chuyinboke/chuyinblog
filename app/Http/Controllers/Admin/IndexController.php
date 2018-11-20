<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use Hash;

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
       
        $pw =$request->input('password');
        // 查看用户是否存在数据表内
        $users =User::where('username',$user)->first();
        // 判断用户是否存在
        if(!$users){

               echo "<script>alert('用户不存在');location.href='/admin'</script>";
        }
        // 判断密码
        if(!Hash::check($pw, $users['password'])){
               echo "<script>alert('密码错误');location.href='/admin'</script>";

        }
        // 判断是否有权限''
        if($users['status'] == 0){
            // 写入session 
            session(['admin'=>$user]);
             echo "<script>alert('登陆成功');location.href='/admin/index'</script>";
        }else{
               echo "<script>alert('用户没有权限');location.href='/admin'</script>";

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
