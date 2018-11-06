<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * 
     * 分类数据处理
     */
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
     *  分类的列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $date =$request->all();
        // 获取一页显示多少条
         $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
       // 获取关键字
         $search =$request->input('search');
        $cate =Category::select('*',DB::raw("concat(path,',',id) as paths "))->orderBy('paths','asc')->where('name','like','%'.$search.'%')->paginate($showcount);
        foreach ($cate as $key => $value) {
            // 统计逗号 出现的次次数
           $n = substr_count($value['path'],',');
           // 拼接名称
           $cate[$key]['name'] = str_repeat('|----',$n).$value['name'];

        }
    

       return view('admin.cate.index',['cate' => $cate,'title'=>'分类列表','date'=>$date]);
       
    }

    /**
     * 分类的添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cate.create',['title'=>'添加分类','cate'=>self::getCates()]);
    }

    /**
     *  执行添加页
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request,[
            'name' => 'required|unique:category|regex:/[^a-zA-Z0-9]/'

        ],[ 
            'name.required' => '内容不能为空',
            'name.unique' => '已有此分类',
            'name.regex' => '格式不正确，请填写中文'
        ]);
        
        // 获取当前的分类是否顶级分类
         $pid =$request->input('pid','');     
        if($pid == 0){
            // 顶级
            $path = 0;
        }else{
            // 获取当前父级的pid
            $parent =Category::find($pid);   
            // 拼接子级的路径
            $path =$parent['path'].','.$parent['id'];
        }
       
         $cate =new Category;
        
         $cate->name =$request->input('name');
         $cate->pid =$request->input('pid','');
         $cate->status =$request->input('status',1);
         $cate->path =$path;    
         $cate->created_at =time();
         $cate->updated_at =time();
         $cate->deleted_at =time();
         $cate->save();
         if($cate){
            return redirect('admin/cate')->with('success','添加成功');
       }else{
            return  back()->with('error','添加失败');
       }
         
    }

    /**
     * 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 修改分类页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date =Category::where('id','=',$id)->first();
        return view('admin.cate.edit',['title'=>'分类修改','date'=>$date,'cates'=>self::getCates()]);
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
       
         $this->validate($request,[
            'name' => 'required|unique:category|regex:/[^a-zA-Z0-9]/'

        ],[ 
            'name.required' => '内容不能为空',
            'name.unique' => '已有此分类',
            'name.regex' => '格式不正确，请填写中文'
        ]);
          // 查询子类
       $child_date = Category::where('pid',$id)->first();
       if($child_date){
        return back()->with('error','当前分类有子分类，不允许修改');
        exit;
       }
         // 获取当前的分类是否顶级分类
         $pid =$request->input('pid','');     
        if($pid == 0){
            // 顶级
            $path = 0;
        }else{
            // 获取当前父级的pid
            $parent =Category::find($pid);   
            // 拼接子级的路径
            $path =$parent['path'].','.$parent['id'];
        }
       // 执行修改
         $cate =Category::where('id','=',$id)->first();
         $cate->name =$request->input('name');
         $cate->pid =$request->input('pid','');
         $cate->status =$request->input('status',1);
         $cate->path =$path;   
         $cate->updated_at =time();
         $cate->deleted_at =time();
          $cate->save();
         if($cate){
      
             return redirect('admin/cate')->with('success','添加成功');
        }else{
             return  back()->with('error','添加失败');
       }
         
    }

    /**
     * 分类删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
       // 查询子类
       $child_date = Category::where('pid',$id)->first();
       if($child_date){
        return back()->with('error','当前分类有子分类，不允许删除');
        exit;
       }
       // 执行删除
        $res =Category::destroy($id);
     if($res){
      
           return redirect('admin/cate')->with('success','删除成功');
       }else{
            return  back()->with('error','删除失败');
       }
    }
}
