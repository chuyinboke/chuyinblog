<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\links;
use DB;
class homelinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //从数据库取数据
        $links=DB::select("select * from links where status = 0");
        // dump($links);
        //加载模板
        return view('admin.links.homelinks',['title'=>'审核友情链接','links'=>$links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //接收数据
         $data =Links::where('id','=',$id)->first();
         return view('admin.links.homeedit',['title'=>'审核页面','data'=>$data]);
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
        //接收数据
        $hlinks =Links::where('id','=',$id)->first();
        $hlinks->status = $request->input('status');
        $hlinks->save();
          if($hlinks){
            return redirect('/admin/links')->with('success','审核通过');
          }else{
            return back('')->with('error','审核不通过');
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
