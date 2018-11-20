<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //加载视图
        $comment = comment::all();
        $date =$request->all();
        $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
        $search =$request->input('search');
        $comment =comment::where('uid','like','%'.$search.'%')->paginate($showcount);
        return view('admin.Comment.index',['title'=>'评论管理','comment'=>$comment,'date'=>$date]); 
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
        //接受数据 进行加精置顶
        $data = comment::where('id',$id)->first();
        return view('admin.Comment.edit',['title'=>'评论加精置顶','data'=>$data]);
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
        //接受页面传过来的数据
        $comment =comment::where('id','=',$id)->first();
        $comment->uid = $request->input('uid');
        $comment->tid = $request->input('tid');
        $comment->content = $request->input('content');
        $comment->settop = $request->input('settop');
        if($comment->save()){
            return redirect('/admin/comment')->with('success','置顶成功');
        }else{
            return back()->whit('error','置顶失败');
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
        //链接数据库 删除数据
        $res = comment::destroy($id);
        if($res){
            return redirect('/admin/comment')->with('success','删除成功');
        }else{
            return back()->whit('error','删除失败');
        }
    }
}
