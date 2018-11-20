<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\comment;
use App\Model\User;
use App\Model\Article;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //接收数据
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
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
        if(empty(session('username'))){
             echo '<script>alert("请先注册用户");location.href="/login/create";</script>';
        }else{
        //视图
          return view('Home.Cate.shows',['id'=>$id]);
        }  
        // dump($request->all()
        $article = new Article;
        $all = article::where('id','=',$id)->first();
        $tid = $all['id'];
        $comment = new comment;
        $name = session('username');
        $comment->uid = $name;
        $comment->tid = $tid;
        $comment->content = $request->input('content');
        $request->hasFile('uid','tid','content');

        if($comment->save()){
            echo '<script>alert("评论成功");location.href="/cate/shows/'.$tid.'";</script>';
        }else{
            echo '<script>alert("评论失败");location.href="publish/'.$id.'/edit";</script>';
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
