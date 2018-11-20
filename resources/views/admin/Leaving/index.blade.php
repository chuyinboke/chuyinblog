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
    <div class="mws-panel-body no-padding">
    <div class="dataTables_wrapper" id="DataTables_Table_1_wrapper" role="grid">
            <form action='/admin/article' method='get'>
                 <div class="dataTables_length" id="DataTables_Table_1_length">
                    <label>显示<select name="showcount"  size="1">
                        <option  value="5"   @if((isset($date['showcount']) && !empty($date['showcount'])) && $date['showcount'] == 5) selected @endif>5</option>
                        <option  value="10"  @if((isset($date['showcount']) && !empty($date['showcount'])) && $date['showcount'] == 10) selected @endif>10</option>
                        <option  value="15"  @if((isset($date['showcount']) && !empty($date['showcount'])) && $date['showcount'] == 15) selected @endif>15</option>   
                    </select> 条</label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>关键字:
                     <input name='search' aria-controls="DataTables_Table_1" type="text"  value="{{ $date['search'] or ''}}">
                 </label>
                    <input type="submit" value='搜索' class='btn btn-info'>
                </div>
            </form>
         
        <table class="mws-table">
            
            <thead>
                <tr>
                    <th>ID</th>
                    <th>留言人</th>
                    <th>留言内容</th>
                    <th>留言时间</th>
                    <th>留言操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($data as $k=>$v)
      			<tr>
      				<td>{{$v['id']}}</td>
      				<td>{{$v['uname']}}</td>
      				<td>{{$v['content']}}</td>
      				<td>{{$v['created_at']}}</td>
      				<td>
	  					<!-- <a href="/admin/Leaving/{{$v['id']}}/edit" class="btn btn-warning">回复</a> -->
	                	<form action="/admin/Leaving/{{$v['id']}}" method="post" style="display:inline-block"> 
	                        {{ csrf_field() }}
	                        {{ method_field('DELETE') }}
	                        <input type="submit" value="删除" class='btn btn-danger'>
	                	</form>
      				</td>
      			</tr>
      			@endforeach
            </tbody>
        </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
            </div>
            <div id='page_page'>
              
            </div> 
        </div>  
    </div>
</div>



@endsection