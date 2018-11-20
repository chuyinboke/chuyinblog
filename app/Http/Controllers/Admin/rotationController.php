<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\rotation;

class rotationController extends Controller
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
           $rotation =rotation::where('name','like','%'.$search.'%')->paginate($showcount);
            
        //加载模板
        return view('/admin.rotation.index',['title'=>'轮播图列表','rotation'=>$rotation,'date'=>$date]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载视图模板
       return view('/admin.rotation.rotation',['title'=>'轮播图管理']);
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
        //判断是否有文件上传
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
            dd('请选择要显示图片');
        }
        $rotation = new rotation;
        $rotation->name = $request->input('name');
        $rotation->describe = $request->input('describe');
        $rotation->image = $profile_path; 
        $rotation->status = $request->input('status');

        $request->hasFile('name','describe','status');
        if($rotation->save()){
            return redirect('/admin/rotation')->with('success','添加成功');
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
        //获取数据
        $data = rotation::where('id','=',$id)->first();
        //加载模板
        return view('admin.rotation.edit',['title'=>'轮播图修改','data'=>$data]);
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
        //判断是否有文件上传
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
        //接收修改的一条数据
        $rotation = rotation::where('id','=',$id)->first();
        $rotation->name = $request->input('name');
        $rotation->describe = $request->input('describe');
        $rotation->image = $profile_path; 
        $rotation->status = $request->input('status');
        //判断数据
        $request->flashOnly('title','url','pic','status');
        //判断是否修改
        if($rotation->save()){
            return redirect('/admin/rotation')->with('success','修改成功');
        }else{
            return back()->whit('error','修改失败');
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
        $res = rotation::destroy($id);
        if($res){
            return redirect('/admin/rotation')->with('success','删除成功');
        }else{
            return back()->whit('error','删除失败');
        }
    }
}
