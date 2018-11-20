<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Leaving;
class LeavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Leaving::all();
        //加载模板视图
        return view('admin.Leaving.index',['title'=>'留言板管理','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // echo "string";
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
        //接受数据 加载模板
        $data = Leaving::where('id',$id)->first();
        return view('admin.Leaving.edit',['title'=>'留言回复','data'=>$data]);
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
        $Leaving = new Leaving;
        $Leaving = Leaving::where('id',$id)->first();
        $Leaving->hcontent = $request->input('hcontent');
        $request->hasFile('hcontent');
        if($Leaving->save()){
            return redirect('/admin/Leaving')->with('success','回复成功');
        }else{
            return back()->whit('error','回复失败');
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
        //接收数据 删除数据
          //删除操作
        $res = Leaving::destroy($id);
        if($res){
            return redirect('admin/Leaving')->with('success','删除成功');
        }else{
            return  back()->with('error','删除失败');
       }
    }
}
