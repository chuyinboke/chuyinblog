<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Notice;
use App\Model\Category;
use App\Model\rotation;
use App\Model\links;
use App\Model\Article;
use App\Model\album;
use App\Model\blogger;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 公告表
        $notice =Notice::all();
         //分类表 父级
        $category =Category::all();
        //分类表 子级
        $categorys=DB::select("select * from category where pid > 0");
       //轮播图接受数据库数据
       $rotation = rotation::all();
       //友情链接接受数据库数据
       $links = links::all();
       //文章显示 接收数据库 
       $article = Article::all();
       // dump($article);
       //图片显示 接通数据库
       $album = album::all();
       //博主简介页面
       $blogger= blogger::all();
       // dump($blogger); 

        
        return view('Home.Index.Index',['notice'=>$notice,'category'=>$category,'categorys'=>$categorys,'rotation'=>$rotation,'links'=>$links,'article'=>$article,'album'=>$album,'blogger'=>$blogger]);
    }
    /**
     *  网站维护页面
     */
    public function modify()
    {
       return view('Home.Index.modify');
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
