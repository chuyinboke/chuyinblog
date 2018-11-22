<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Config;

class ConfigController extends Controller
{
  /**
   *  网站配置的修改页
   * 
   */
  public function create()
  {
    $config =DB::table('config')->find(1);
   return view('admin.config.edit',['config'=>$config,'name'=>'网站配置']); 
  }
  /**
   * 执行修改
   */
  public function store(Request $request)
  {
       $this->validate($request,[
            'title' => 'required|regex:/[^a-zA-Z0-9]/',
            // 'pic' => 'required',
            'copyright' =>'required'

        ],[ 
            'title.required' => '标题内容不能为空',
            'title.regex' => '格式不正确，请填写中文',
            // 'pic.required' => '请添加LOGO',
            'copyright.required' => '请填写版权内容'
        ]);
      //判断是否有文件上传
        if($request-> hasFile('pic')){
            //接收数据
            $profile = $request-> file('pic');
            //获取上传文件后缀名s
            $ext = $profile-> getClientOriginalExtension();
            //给上传文件一个随机名
            $file_name = str_random(20).time().'.'.$ext;
            //把上传文件存储到指定路径
            $dir_name = './logo/'.date('Ymd',time());
            //把这个文件保存到这个位置
            $res = $profile-> move($dir_name,$file_name);
            //拼接路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            $profile_path = '/h/images/2.jpg';
        }
        // $config =DB::table('config')->find(1);
        $config = Config::find(1);
        $config->title =$request->input('title');
        $config->logo =$profile_path;
        $config->copyright =$request->input('copyright');
        $config->status =$request->input('status');
        $res =$config->save();
        if($res){
    
            return redirect('/config/create')->with('success','修改成功');
        }else{
            
            return back()->with('error','修改失败');
        }
  }
}
