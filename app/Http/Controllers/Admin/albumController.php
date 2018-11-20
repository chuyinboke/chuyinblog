<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据
        $date = $request->all();
        $search =$request->input('search','');
        $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
        //接收数据 
        $album =album::where('name','like','%'.$search.'%')->paginate($showcount);

        //加载模板
        return view('/admin.album.index',['title'=>'图片列表','album'=>$album,'date'=>$date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('admin.album.album',['title'=>'添加图片']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证数据
         $this->validate($request,[
            'name' => 'required|regex:/[^a-zA-Z0-9]/',
            'describe' =>'required',
            'status'=>'required'

        ],[ 
            'name.required' => '图片名字不能为空',
            'name.regex'=>'图片名字必须是中文',
            'describe.required'=>'图片介绍不能为空',
            'status.required'=>'图片状态不能为空'
        ]);
        //接收数据
        // dump($request->all());
         //判断是否有文件上传
        if($request-> hasFile('image')){
            //接收数据
            $profile = $request-> file('image');
            //获取上传文件后缀名
            $ext = $profile-> getClientOriginalExtension();
            //给上传文件一个随机名
            $file_name = str_random(20).time().'.'.$ext;
            //把上传文件存储到指定路径
            $dir_name = './tupian/'.date('Ymd',time());
            //把这个文件保存到这个位置
            $res = $profile-> move($dir_name,$file_name);
            //拼接路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            dd('请选择要显示图片');
        }
        $album = new album;
        $album->name = $request->input('name');
        $album->describe = $request->input('describe');
        $album->image = $profile_path; 
        $album->status = $request->input('status');

        $request->hasFile('name','describe','status');
        if($album->save()){
            return redirect('/admin/album')->with('success','添加成功');
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
        //获取数据
            $date = $request->all();
            $search =$request->input('search','');
            $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
        //接收数据 
           $album =album::where('name','like','%'.$search.'%')->paginate($showcount);
            
        //加载模板
        return view('/admin.album.index',['title'=>'图片列表','album'=>$album,'date'=>$date]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     //获取数据
        $data = album::where('id','=',$id)->first();
        //加载模板
        return view('admin.album.edit',['title'=>'图片修改','data'=>$data]);
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
        //验证数据
         $this->validate($request,[
            'name' => 'required|regex:/[^a-zA-Z0-9]/',
            'describe' =>'required',
            'status'=>'required'

        ],[ 
            'name.required' => '图片名字不能为空',
            'name.regex'=>'图片名字必须是中文',
            'describe.required'=>'图片介绍不能为空',
            'status.required'=>'图片状态不能为空'
        ]);
        // //判断是否有文件上传
        if($request-> hasFile('image')){
            //接收数据
            $profile = $request-> file('image');
            //获取上传文件后缀名
            $ext = $profile-> getClientOriginalExtension();
            //给上传文件一个随机名
            $file_name = str_random(20).time().'.'.$ext;
            //把上传文件存储到指定路径
            $dir_name = './lunbotu/'.date('Ymd',time());
            //把这个文件保存到这个位置
            $res = $profile-> move($dir_name,$file_name);
            //拼接路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            dd('请选择要修改显示图片');
        }
        $album = album::where('id','=',$id)->first();
        $album->name = $request->input('name');
        $album->describe = $request->input('describe');
        $album->image = $profile_path; 
        $album->status = $request->input('status');

        $request->hasFile('name','describe','status');
        if($album->save()){
            return redirect('/admin/album')->with('success','添加成功');
        }else{
            return back()->whit('error','添加失败');
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
        //获取数据 删除数据
        $res = album::destroy($id);
        if($res){
            return redirect('/admin/album')->with('success','删除成功');
        }else{
            return back()->whit('error','删除失败');
        }
    }
}
