<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Model\User;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request = $request->all();
        // $searchs =empty($request['search']) ? '' : $request['search'];
        // $searchs =$request->input('search','');
        // dump($searchs);
        // $user =User::where('username','like','%'.$searchs.'%')->paginate(5);

        $user =User::paginate(5);

        return view('admin.user.index',['title'=>'用户列表','user'=>$user,'request'=>$request]);

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
       $user->save();
        dump($user);
       if($user){
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

        return view('admin.user.edit',['title'=>'修改用户','date'=>$date]);
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
            return redirect('admin/user')->with('success','修改成功');
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
        $res =User::destroy($id);
      if($res){
      
            return redirect('admin/user')->with('success','删除成功');
       }else{
            return  back()->with('error','删除失败');
       }

    }
}
