<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Person;
use App\Model\User;

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
        // 登陆获取的用户名和密码
         $username =$request->input('username');
        $pw =$request->input('password');
        // 查询对应用户名的  id
        $user =User::where('username','=',$username)->first();
        $person =new Person;
        // 用户的id  =  个人资料的 uid
        $person->uid =$user['id'];
        $person->save();
        // 检查数据库中是否存在
        session(['username'=>$username]);
        $res =DB::table('user')
            ->where('username','=',$username)
            ->where('password','=',$pw)
            ->first();
       if($res){
            echo "<script>alert('登陆成功');location.href='/home'</script>";
           
       }else{
        
           echo "<script>alert('登录失败');location.href='/loginuser/create'</script>";
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
