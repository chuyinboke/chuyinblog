<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\article;
use App\Model\User;


class PublishController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * 发表帖子页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(empty(session('username'))){
             echo '<script>alert("请先注册用户");location.href="/login/create";</script>';
          
        }else{
           // 发表帖子页面
         
          // 视图
          return view('Home.Tiezi.publish',['id'=>$id]);
        }
    }

    /**
     * 执行帖子添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          
        $this->validate($request,[
            'title' => 'required'   

        ],[ 
            'title.required' => '标题不能为空'
        ]);
          // 获取用户
           $user =session('username');
           $tid =User::where('username',$user)->get();
          //判断是否有图片上传
        if($request-> hasFile('image')){
            //接收数据
            $profile = $request-> file('image');
            //获取上传文件后缀名
            $ext = $profile-> getClientOriginalExtension();
            //给上传文件一个随机名
            $file_name = str_random(20).time().'.'.$ext;
            //把上传文件存储到指定路径
            $dir_name = './uploads/'.date('Ymd',time());
            //把这个文件保存到这个位置
            $res = $profile-> move($dir_name,$file_name);
            //拼接路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }     
        $article = new Article;
        $article->tid =$tid[0]['id'];
        $article->title =$request->input('title');
        $article->image =isset($profile_path) ? $profile_path : '';
        $article->source =$request->input('source');
        $article->editrs =$user;
        $article->fenlei =$id;
        $article->content =$request->input('content');
       if($article->save()){
             echo '<script>alert("发表成功");location.href="/home";</script>';
       }else{
              echo '<script>alert("发表失败");location.href="publish/$id/edit";</script>';
       }
        
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
