<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Article;
use App\Model\Category;
use App\Model\User;

class CateController extends Controller
{
   /**
    * 分类列表页
    */
    public function show($id)
    {
        $cates =Category::where('id',$id)->get();
        // 分类下的所有文章
        $article =Article::where('fenlei',$id)->paginate(5);
        return  view('Home.Cate.list',['article'=>$article,'cates'=>$cates]);
    }
    /**
     *
     * 文章详情表
     */
    public function shows($id)
    {
        // 帖子的内容
        $article =Article::where('id',$id)->get();
        $tid =$article[0]['tid'];
        // 用户的信息
        $user = User::where('id',$tid)->get();
       return view('Home.Cate.shows',['article'=>$article,'user'=>$user]);
    }

   
   
}
