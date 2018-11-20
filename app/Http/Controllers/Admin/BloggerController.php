<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\blogger;

class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //加载数据库数据 
        $blogger = blogger::all();
        //
        return view('admin.Blogger.index',['title'=>'博主简介','blogger'=>$blogger]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view('admin.Blogger.Blogger',['title'=>'关于博主']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //接收数据 廷加到数据库
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
            $dir_name = './lunbotu/'.date('Ymd',time());
            //把这个文件保存到这个位置
            $res = $profile-> move($dir_name,$file_name);
            //拼接路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            dd('请选择要显示图片');
        }
        // dd($request->all());
        $blogger = new blogger;
        $blogger->name = $request->input('name');
        $blogger->sex = $request->input('sex');
        $blogger->age = $request->input('age');
        $blogger->height = $request->input('height');
        $blogger->Begoodat = $request->input('Begoodat');
        $blogger->editrs = $request->input('editrs');
        $blogger->image = $profile_path;
        $blogger->status = $request->input('status');
        $blogger->content = $request->input('content');
        $request->hasFile('name','editrs','status','content');
        if($blogger->save()){
            return redirect('/admin/Blogger')->with('success','添加成功');
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
        $data = blogger::where('id',$id)->first();
        //加载模板
        return view('admin.Blogger.edit',['title'=>'博主修改','data'=>$data]);
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
        //接收数据 廷加到数据库
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
        // dump($request->all());
        $blogger = blogger::where('id',$id)->first();
        $blogger->name = $request->input('name');
        $blogger->sex = $request->input('sex');
        $blogger->age = $request->input('age');
        $blogger->height = $request->input('height');
        $blogger->Begoodat = $request->input('Begoodat');
        $blogger->editrs = $request->input('editrs');
        $blogger->image = $profile_path;
        $blogger->status = $request->input('status');
        $blogger->content = $request->input('content');
        $request->hasFile('name','editrs','status','content');
        if($blogger->save()){
            return redirect('/admin/Blogger')->with('success','修改成功');
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
        //删除操作
          $res = blogger::destroy($id);
        if($res){
            return redirect('admin/Blogger')->with('success','删除成功');
        }else{
            return  back()->with('error','删除失败');
       }

    }
}
