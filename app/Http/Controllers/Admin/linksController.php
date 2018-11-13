<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\links;
class linksController extends Controller
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
        // dump($date);
        $search =$request->input('search');
        // dump($search);
        $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
        $data =Links::where('title','like','%'.$search.'%')->paginate($showcount);
       
    

      
        //加载模板
        return view('admin.links.index',['title'=>'友情链接列表','data'=>$data,'date'=>$date]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板 添加数据 
        return view('admin.links.links',['title'=>'链接添加']);
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
            'title' => 'required|regex:/[^a-zA-Z0-9]/',
            'url' =>'required',
            'status'=>'required'

        ],[ 
            'title.required' => '链接名字不能为空',
            'title.regex'=>'链接名字必须是中文',
            'url.required'=>'链接地址不能为空',
            'status.required'=>'链接状态不能为空'
        ]);
        
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
        //接收数据
        $links = new links;
        $links->title = $request-> input('title');
        $links->url = $request-> input('url');
        $links->pic = $profile_path;
        $links->status = $request-> input('status');

        $request->flashOnly('title','url','pic','status');

        if($links->save()){
            return redirect('/admin/links')->with('success','添加成功');
        }else{
            return back()->whit('error','添加失败');
        }
        // dump($request-> all());
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
        $data = links::where('id',$id)->first();
        //加载模板
        return view('admin.links.edit',['title'=>'链接修改','data'=>$data]);
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
        //接收数据
        $links = links::where('id','=',$id)->first();
        $links->title = $request-> input('title');
        $links->url = $request-> input('url');
        $links->pic = $profile_path;
        $links->status = $request-> input('status');

        $request->flashOnly('title','url','pic','status');

        if($links->save()){
            return redirect('/admin/links')->with('success','修改成功');
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
        $res = Links::destroy($id);
        if($res){
            return redirect('/admin/links')->with('success','删除成功');
        }else{
            return back()->whit('error','删除失败');
        }

        
    }
}
