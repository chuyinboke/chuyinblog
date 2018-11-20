<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Notice;

class NoticeController extends Controller
{
    /**
     * 公告列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 分页搜索
        $request =$request->all();
        $search =isset($request['search']) ? $request['search'] : '';
        $showcount =isset($request['showcount']) ? $request['showcount'] : 5;

        $notice =Notice::where('title','like','%'.$search.'%')->paginate($showcount);
         return view('admin.notice.index',['title'=>'公告列表','notice'=>$notice,'request'=>$request]);
    }

    /**
     * 公告添加
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create',['title'=>'公告添加']);
    }

    /**
     * 公告执行添加
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'title' => 'required|regex:/[^a-zA-Z0-9]/',
            // 'count' => 'required'

        ],[ 
            'title.required' => '标题不能为空',
            'title.regex' => '格式不正确，请填写中文',
            // 'count.required' => '内容不允许为空'
        ]);
          $notice =new Notice;
          $notice->title =$request->input('title');
          $notice->count =$request->input('count');
          $notice->status =$request->input('status');
          $notice->save();
          if($notice){
             return redirect('admin/notice')->with('success','添加成功');
          }else{
             return blck()->with('error','添加失败');
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
     * 公告修改
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date =Notice::where('id','=',$id)->first();
        return view('admin.notice.edit',['title'=>'公告修改','date'=>$date]);
    
        
    }

    /**
     * 执行公告修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $this->validate($request,[
            'title' => 'required|regex:/[^a-zA-Z0-9]/',
            // 'count' => 'required'

        ],[ 
            'title.required' => '标题不能为空',
            'title.regex' => '格式不正确，请填写中文',
            // 'count.required' => '内容不允许为空'
        ]);
          $notice =Notice::where('id','=',$id)->first();
          $notice->title =$request->input('title');
          $notice->count =$request->input('count');
          $notice->status =$request->input('status');
          $notice->updated_at =time();
          $notice->save();
          if($notice){
            return redirect('/admin/notice')->with('success','修改成功');
          }else{
            return back('')->with('error','修改失败');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // 获取从视图传过来的值ajax
         $a = $request->all();
         $id = $a['id'];
         $res =Notice::destroy($id);
      if($res){
             return 'success';
       }else{
            return 'error';
       }
    }
   

}
