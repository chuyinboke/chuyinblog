<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Person;
use App\Model\User;
use App\Model\Article;
use Hash;

class PersonController extends Controller
{
    /**
     * 个人中心
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user =session('username');
        // 获取用户的数据
        $all =User::where('username','=',$user)->first();
        // 获取这个用户发表的文章
        $article =Article::where('tid',$all['id'])->get();
        // 热门博主推荐
        $hot =User::where('status',1)->paginate(3);
        return view('Home.Login.person',['all'=>$all,'article'=>$article,'hot'=>$hot]);
    }
    /**
     * 
     */

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
         //判断是否有文件上传
        if($request-> hasFile('pic')){
            //接收数据
            $profile = $request-> file('pic');
            //获取上传文件后缀名
            $ext = $profile-> getClientOriginalExtension();
            //给上传文件一个随机名
            $file_name = str_random(20).time().'.'.$ext;
            //把上传文件存储到指定路径
            $dir_name = './touxiang/'.date('Ymd',time());
            //把这个文件保存到这个位置
            $res = $profile-> move($dir_name,$file_name);
            //拼接路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            dd('请选择头像');
        }
        // 对数据进行验证
          $this->validate($request,[
            'email' => 'required|email',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/'

        ],[ 
            // 字段错误提示信息
            'email.email' => '邮箱格式不正确',
            'email.required' => '邮箱不许为空',
            'phone.required' => '手机号不许为空',
            'phone.regex' => '手机号格式不正确'    
        ]);
        // 用户修改
             $user =User::where('username','=',session('username'))->first();
             $user->email =$request->input('email');
             $user->phone =$request->input('phone');
             $users = $user->save();
         
        //个人资料修改
            $person =Person::where('uid','=',$user['id'])->first();
            $person->pic = $profile_path;
            $person->birthday =$request->input('birthday');
            $person->like =$request->input('like');
            $person->hy =$request->input('hy');
            $person->qm =$request->input('qm');
            $persons= $person->save();
            if($users && $persons){
             echo "<script>alert('修改成功');location.href='/home';</script>";  
            
            }else{
               echo "<script>alert('修改失败');location.href='/person/create';</script>"; 
                 
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
     * 个人中心  帖子的删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         // ajax删除
         $a = $request->all();
         $id = $a['id'];

          $res =Article::destroy($id);
          if($res){
            return 'success';
          }else{
            return 'error';

          }
    }
    /**
     *浏览其他博主的主页面
     * 
     */
    public function bloggercenter($id)
    {
        // 查询博主的个人信息 与帖子
        $all =User::find($id);
         // 热门博主推荐
        $hot =User::where('status',1)->paginate(3);
        return view('Home.Login.bloggercenter',['all'=>$all,'hot'=>$hot]);
    }
}
