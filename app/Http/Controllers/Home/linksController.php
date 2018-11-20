<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\links;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('Home.links.links');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'wzname' => 'required',
            'wzurl' => 'required',
            'status' => 'required',

        ],[ 
            // 字段错误提示信息
            'wzname.required' => '网站名称不许为空',  
            'wzurl.required' => '网站地址不许为空',  
            'status.required' => '申请连接未选中',  
        ]);
        //执行添加链接
        //判断是否有文件上传
        if($request-> hasFile('pic')){
            //接收数据
            $profile = $request-> file('pic');
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
        }else{
            dd('请选择文件');
        }
        //实例化模板
        $links = new Links;
        //像数据库加载数据
        $links->title = $request->input('wzname');
        $links->url = $request->input('wzurl');
        $links->pic =$profile_path;
        $links->status = $request->input('status');
        $request->flashOnly('title','url','pic','status');
        if($links->save()){
            return redirect('/home')->with('success','添加成功');
        }else{
            return back()->whit('error','添加失败');
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
}
