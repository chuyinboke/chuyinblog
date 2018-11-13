<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Person;
use App\Model\User;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user =session('username');
        // 获取用户的数据
        $all =User::where('username','=',$user)->first();
        // 获取用户个人信息
        $person =$all->userperson;
    
        return view('Home.Login.person',['all'=>$all,'person'=>$person]);
    }

    /**
     * 修改
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $user =session('username');
    // 获取用户的数据
    $all =User::where('username','=',$user)->first();
    // 获取用户个人信息
    $person =$all->userperson;
    return view('Home.Login.edit',['all'=>$all,'person'=>$person]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 对数据进行验证
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
    
      
    // 用户修改
     $user =User::where('username','=',session('username'))->first();
     $user->username =$request->input('username');
     $user->password =$request->input('password');
     $user->email =$request->input('email');
     $user->phone =$request->input('phone');
    $users = $user->save();
     
    // //个人资料修改
    $person =Person::where('uid','=',$user['id'])->first();
    $person->birthday =$request->input('birthday');
    $person->like =$request->input('like');
    $person->hy =$request->input('hy');
    $person->qm =$request->input('qm');
    $persons= $person->save();
    if($users && $persons){
            session(['username'=>$user['username']]);
          echo "<script>alert('修改成功');location.href='/home'</script>";
    }else{
           echo "<script>alert('修改失败');location.href='/person/create'</script>";

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
