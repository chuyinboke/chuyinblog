<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Category;


class CategoryController extends Controller
{
    /**
     *  分类的列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date =$request->all();
        $search =($request->input('search'));
        $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
        $cate =Category::where('name','like','%'.$search.'%')->paginate($showcount);
    
       return view('admin.cate.index',['cate' => $cate,'title'=>'分类列表','date'=>$date]);
    }

    /**
     * 分类的添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.cate.create',['title'=>'添加分类']);
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
         $cate =new Category;
        
         $cate->name =$request->input('name');
         $cate->title =$request->input('title');
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
        return view('admin.cate.edit',['title'=>'分类修改','date'=>$date]);
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
         $cate =Category::where('id','=',$id)->first();
        
         $cate->name =$request->input('name');
         $cate->title =$request->input('title');
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
          $res =Category::destroy($id);
      if($res){
      
            return redirect('admin/cate')->with('success','删除成功');
       }else{
            return  back()->with('error','删除失败');
       }
    }
}
