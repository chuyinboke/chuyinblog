<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;
class RecycleController extends Controller
{
    
    use SoftDeletes;
   /**
    * 回收站列表
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
       dump($res);
       if($res){
             return redirect('/recycle')->with('success','恢复成功');
       }else{
             return redirect('/recycle')->with('error','恢复失败');
            
       }
   }
   /**
    * 永久删除
    * 
    */
   public function destroy($id)
   {
      $user =User::withTrashed()->where('id','=', $id);      
      if($user->forceDelete()){
             return redirect('/recycle')->with('success','删除成功');
         }else{
             return redirect('/recycle')->with('error','删除失败');
         }
     
   }
    
    
}
