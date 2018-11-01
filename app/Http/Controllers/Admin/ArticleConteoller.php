<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Http\Requests\ArticleStoreRequest;
use DB;
class ArticleConteoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //搜索分页
        $showcount = $request->input('showcount',5);
        $search = $request->input('search');
        $date = $request->all();
        //加载数据
        $article = Article::where('title','like','%'.$search.'%')->paginate($showcount);
        //加载模板
        return view('admin.article.index',['title'=>'文章列表','article'=>$article,'date'=>$date]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('admin.article.article',['title'=>'文章添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证文章标题是否为空
        $this->validate($request,[
            'title' => 'required|unique:article|regex:/[^a-zA-Z0-9]/',
            'editrs' => 'required',
            'content' => 'required'
        ],[ 
            'title.required'=> '标题不能为空',
            'title.unique'=> '标题不能重复',
            'title.regex'=> '标题不能是符号',
            'editrs.required'=> '作者不能为空',
            'content.required'=> '内容不能为空'
        ]);
        // 开启事务
        DB::beginTransaction();
        //接受数据
        $article = new Article;
        $article->title = $request-> input('title','');
        //tid 等分类写完在家
        $article->editrs = $request-> input('editrs','');
        $article->source = $request-> input('source','');
        $article->fenlei = $request-> input('fenlei','');
        $article->content = $request-> input('content','');
        $res = $article->save();
          if($res){
        // 提交事务
            DB::commit();
            return redirect('admin/article')->with('success','添加成功');
       }else{
        // 回滚
            DB::rollBack();
            return  back()->with('error','添加失败');
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
       $data = Article::where('id','=',$id)->first();
       // dump($data);
       //加载模板
       return view('/admin.article.edit',['title'=>'文章修改','data'=>$data]);
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
        //验证文章标题是否为空
        $this->validate($request,[
            'title' => 'required|unique:article|regex:/[^a-zA-Z0-9]/',
            'editrs' => 'required',
            'content' => 'required'
        ],[ 
            'title.required'=> '标题不能为空',
            'title.unique'=> '标题不能重复',
            'title.regex'=> '标题不能是符号',
            'editrs.required'=> '作者不能为空',
            'content.required'=> '内容不能为空'
        ]);
        //获取数据  进行修改
        // 开启事务
        DB::beginTransaction();
        //接受数据
        $article = Article::where('id','=',$id)->first();
        $article->title = $request-> input('title','');
        //tid 等分类写完在家
        $article->editrs = $request-> input('editrs','');
        $article->source = $request-> input('source','');
        $article->fenlei = $request-> input('fenlei','');
        $article->content = $request-> input('content','');
        $res = $article->save();
        if($res){
        // 提交事务
            DB::commit();
            return redirect('admin/article')->with('success','修改成功');
       }else{
        // 回滚
            DB::rollBack();
            return  back()->with('error','修改失败');
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
        $res = Article::destroy($id);
        if($res){
            return redirect('admin/article')->with('success','删除成功');
        }else{
            return  back()->with('error','删除失败');
       }
    }
}