@extends('admin.clone_index.clone')
@section('content')
<!-- 显示验证错误信息 -->
@if (count($errors) > 0)
<div class="mws-form-message error">
	<ul>
	    @foreach ($errors->all() as $error)
	        <li>{{ $error }}</li>
	    @endforeach
	</ul>
</div>
@endif
<div class="mws-panel grid_8">
  		<div class="mws-panel-header">
        	<span><i class="icon-table"></i>{{ $title or '' }}</span>
   	 	</div>
<div class="dataTables_wrapper" id="DataTables_Table_1_wrapper" role="grid">
    <div class="mws-panel-body no-padding">
    	<table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>博主名字</th>
                  	<th>博主简介</th>
                  	<th>博主头像</th>
                  	<th>简介状态</th>
                  	<th>添加时间</th>
                  	<th>权限操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($blogger as $v)
            	<tr>
            		<td>{{$v['id']}}</td>
            		<td>{{$v['name']}}</td>
            		<td>{{$v['editrs']}}</td>
            		<td><span class="thumbnail"><img src="{{$v['image']}}" style="width:150px;height:100px"></span></td>
            		<td> 
            			@if($v['status'] == 1)
	                      <button style='color:yellow;background:black'>开启</button>
	                    @else
	                      <button style='color:red;background:black'>关闭</button>
	                    @endif
	                </td>
            		<td>{{$v['created_at']}}</td>
            		<td>                        
            			<a href="/admin/Blogger/{{$v['id']}}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/Blogger/{{$v['id']}}" method="post" style="display:inline-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                           <input type="submit" value="删除" class="btn btn-danger"> 
                        </form>
					</td>
            	</tr>
            	@endforeach
            </tbody>
        </table>
     
	</div>    
</div>
@endsection