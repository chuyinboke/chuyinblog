<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Category;
use App\Model\User;
use App\Http\Requests\ArticleStoreRequest;
use DB;
class ArticleConteoller extends Controller
{

    public static function getCates()
    {
        $cate =Category::select('*',DB::raw("concat(path,',',id) as paths "))->orderBy('paths','asc')->get();

        foreach ($cate as $key => $value) {
            // 统计逗号 出现的次次数
           $n = substr_count($value['path'],',');
           // 拼接名称
           $cate[$key]['name'] = str_repeat('|----',$n).$value['name'];

        }
        return $cate;
    }
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
        return view('admin.article.index',['title'=>'文章列表','article'=>$article,'date'=>$date,'cate'=>self::getCates()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return view('admin.article.article',['title'=>'文章添加','cate'=>self::getCates()]);
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
            'content' => 'required'
        ],[ 
            'title.required'=> '标题不能为空',
            'title.unique'=> '标题不能重复',
            'title.regex'=> '标题不能是符号',
            'content.required'=> '内容不能为空'
        ]);
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
        // 开启事务
        DB::beginTransaction();
        //接受数据
        $article = new Article;
        $article->title = $request-> input('title','');
        //获取当前用户 添加到数据库
        $name = session('admin');
        $article->editrs = $name;
        //获取tid 添加到数据库
        $user = User::where('username',$name)->first();
        $uname = $user['id'];
        $article->tid = $uname;
        //获取数据 使用模型添加到数据库
        $article->image =   $profile_path;
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
       return view('/admin.article.edit',['title'=>'文章修改','data'=>$data,'cate'=>self::getCates()]);
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
            'content.required'=> '内容不能为空'
        ]);
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
        //获取数据  进行修改
        // 开启事务
        DB::beginTransaction();
        //接受数据
        $article = Article::where('id','=',$id)->first();
        $article->title = $request-> input('title','');
        $name = session('admin');
        $article->editrs = $name;
        $article->image = $profile_path;
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
