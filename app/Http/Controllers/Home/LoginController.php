<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Model\User;
use App\Model\Person;
use Hash;


class LoginController extends Controller
{
    /**
     * 
     *
     * 
     */
    public function index(Request $request)
    {
       
    }

    /**
     * 注册页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Home.Login.login');
    }

    /**
     * 执行注册
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
              'username' => 'required|unique:user|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'password' => 'required|regex:/^[\w]{6,18}$/',
            'repassword' => 'required|same:password',
            'email' => 'required|email',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/'

        ],[ 
            // 字段错误提示信息
            'username.required' => '用户名不许为空',
            'username.regex' => '用户名格式错误',
            'username.unique' => '用户名已存在',
            'password.required' => '密码不许为空',
            'password.regex' => '密码格式不正确',
            'repassword.same' => '两次密码不一致',
            'repassword.required' => '确认密码不许为空',
            'email.email' => '邮箱格式不正确',
            'email.required' => '邮箱不许为空',
            'phone.required' => '手机号不许为空',
            'phone.regex' => '手机号格式不正确'    
        ]);
         // 注册用户
      $user =new User;
      $user->username =$request->input('username');
      $user->password =Hash::make($request->input('password'));
      $user->email =$request->input('email');
      $user->phone =$request->input('phone');
      $user->created_at =time();
      $user->updated_at =time();
      $user->save();
     
      // 查询对应用户名的  id
        $user =User::where('username','=',$user['username'])->first();
      $person =new Person;
        // 用户的id  =  个人资料的 uid
        $person->uid =$user['id'];
        $person->save();
       if($user){
            echo "<script>alert('注册成功，赶紧登陆吧');location.href='/home'</script>";
           
       }else{
        
           echo "<script>alert('注册失败');location.href='/login/create'</script>";
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
}
