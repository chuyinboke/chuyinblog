<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class RecyclewzContRoller extends Controller
{
     use SoftDeletes;


    /**
     *  文章回收站列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date =$request->all();
        $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
        $search =$request->input('search');
          // 获取被删除的数据
         $article =Article::onlyTrashed()->where('title','like','%'.$search.'%')->paginate($showcount);  
    return view('admin.recycle.articlelist',['article'=>$article,'title'=>'文章回收站','date'=>$date]);
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
     *  恢复被删除的文章数据
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $article =Article::withTrashed()->where('id','=', $id)->restore();      
      if($article){
             return redirect('/recyclewz')->with('success','恢复成功');
         }else{
             return redirect('/recyclewz')->with('error','恢复失败');
         }
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
    public function destroy(Request $request)
    {
           // ajax删除
         $a = $request->all();
         $id = $a['id'];
         // 获取被软删除的数据
        $article =Article::withTrashed()->where('id','=', $id);      
      if($article->forceDelete()){
            return 'success';
         }else{
            return 'error';
         }
     
    }
}
