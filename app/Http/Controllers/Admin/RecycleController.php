<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Person;
use App\Model\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
class RecycleController extends Controller
{
    
    use SoftDeletes;
   /**
    * 回收站用户列表
    * 
    */
   public function index( Request $request)
   {
        $date =$request->all();
        $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
        $search =$request->input('search');
    // 获取被删除的数据
    $user =User::onlyTrashed()->where('username','like','%'.$search.'%')->paginate($showcount);
    return view('admin.recycle.userlist',['user'=>$user,'date'=>$date]);
   }
   /**
    * 恢复数据
    * 
    */
   public function edit( $id)
   {
       $res =User::withTrashed()->where('id','=',$id)->restore();
       $res2 =Person::withTrashed()->where('uid','=',$id)->restore();
      
       if($res && $res2){
             return redirect('/recycle')->with('success','恢复成功');
       }else{
             return redirect('/recycle')->with('error','恢复失败');
            
       }
   }
   /**
    * 永久删除
    * 
    */
   public function destroy(Request $request)
   {
        // ajax删除
        $a = $request->all();
         $id = $a['id'];

    // 删除用户
      $user =User::withTrashed()->where('id','=', $id); 
      $res =$user->forceDelete();
       // 删除个人信息
      $person =Person::withTrashed()->where('uid','=', $id); 
      $res2 =$person->forceDelete();
       // 删除文章
         // 查询是否有文章
        $res3 =Article::withTrashed()->where('tid',$id);
        // 有就删除
        if($res3){
           $res3 ->forceDelete();
        } 

      if($res && $res2){
                return 'success';  
         }else{
                return 'error';
         }
     
   }
    
    
}
