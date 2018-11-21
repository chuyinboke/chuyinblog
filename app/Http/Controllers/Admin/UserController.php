<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Model\User;
use Hash;
use DB;
use App\Model\Person;
use App\Model\Article;

class UserController extends Controller
{
    /**
     * 用户列表页
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date =$request->all();
        $showcount =isset($date['showcount']) ? $date['showcount'] : 5;
        $search =$request->input('search');
        $user =User::where('username','like','%'.$search.'%')->paginate($showcount);
        return view('admin.user.index',['title'=>'用户列表','user'=>$user,'date'=>$date]);

    }

    /**
     * 用户添加页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create',['title'=>'用户添加']);
    }

    /**
     * 执行添加页面
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {
        // 开启事务
        DB::beginTransaction();
       // 获取数据，进行添加
       $user = new User;
       $user->username =$request->input('username');
       $user->password =Hash::make($request->input('password'));
       $user->email =$request->input('email');
       $user->phone =$request->input('phone');
       $user->status =$request->input('status');
       $user->created_at =time();
       $user->updated_at =time();
       $res =$user->save();
         // 查询对应用户名的  id
       $person =new Person;
        // 用户的id  =  个人资料的 uid
       $person->uid =$user['id'];
       $res2 =$person->save();


       if($res && $res2){
        // 提交事务
            DB::commit();
            return redirect('admin/user')->with('success','添加成功');
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
     * 修改页面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $date =User::where('id','=',$id)->first();
        if($date['status'] == 0){
            return  back()->with('error','禁止修改其他管理员');
        }else{
        return view('admin.user.edit',['title'=>'修改用户','date'=>$date]);

        }
    }

    /**
     * 执行修改
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersStoreRequest $request, $id)
    {
           // 开启事务
        DB::beginTransaction();
       // 获取数据，进行添加
       $user =User::where('id','=',$id)->first();
       $user->username =$request->input('username');
       $user->password =Hash::make($request->input('password'));
       $user->phone =$request->input('phone');
       $user->email =$request->input('email');
       $user->updated_at =time();
       $user->status =$request->input('status');
       $user->save();
       if($user){
        // 提交事务
            DB::commit();
            session(['admin'=>$user['username']]);
            return redirect('admin/user')->with('success','修改成功');
       }else{
        // 回滚
            DB::rollBack();
            return  back()->with('error','修改失败');
       }

    }

    /**
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {    
        // ajax删除
         $a = $request->all();
         $id = $a['id'];

    
        $res =User::destroy($id);
       // 删除个人信息
        $res2 =Person::where('uid',$id)->delete();
        // 查询是否有文章
        $res3 =Article::where('tid',$id)->get();
        // 有就删除
        if($res3){
           $res3 =Article::where('tid',$id)->delete();
        } 
      if($res && $res2){
          return 'success';    
       }else{
          return 'error';
       }

    }
  

}
