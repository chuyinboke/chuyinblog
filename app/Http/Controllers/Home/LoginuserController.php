<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Person;
use App\Model\User;
use Hash;

class LoginuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * 登录用户
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.Login.loginuser');       
    }

    /**
     *验证登陆用户 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
              'username' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'password' => 'required|regex:/^[\w]{6,18}$/',
            'repassword' => 'required|same:password'
        ],[ 
            // 字段错误提示信息
            'username.required' => '用户名不许为空',
            'username.regex' => '用户名格式错误',
            'password.required' => '密码不许为空',
            'password.regex' => '密码格式不正确',
            'repassword.same' => '两次密码不一致',
            'repassword.required' => '确认密码不许为空',
        ]);
         $user =$request->input('username');
       
        $pw =$request->input('password');
        // 查看用户是否存在数据表内
        $users =User::where('username',$user)->first();
        // 判断用户是否存在
        if(!$users){

               echo "<script>alert('用户不存在');location.href='/loginuser/create'</script>";
        }
        // 判断密码
        if(!Hash::check($pw, $users['password'])){
               echo "<script>alert('密码错误');location.href='/loginuser/create'</script>";

        }
        // 判断是否有权限''
        if($users['status'] == 1){
            // 写入session 
            session(['username'=>$user]);
             echo "<script>alert('登陆成功');location.href='/home'</script>";
        }else{
               echo "<script>alert('用户没有权限');location.href='/loginuser/create'</script>";

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * 删除session 
     * 
     */
    public function del()
    {
        session(['username'=>null]);
        return redirect('/home');
    }
}
