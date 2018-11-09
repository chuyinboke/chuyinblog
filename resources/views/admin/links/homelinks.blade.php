@extends('admin.clone_index.clone')
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>{{ $title or '' }}</span>
    </div>
     <div class="dataTables_wrapper" id="DataTables_Table_1_wrapper" role="grid">


            <form action='/admin/links' method='get'>
                 <div class="dataTables_length" id="DataTables_Table_1_length">
                    <label>显示<select name="showcount"  size="1">
                        <option  value="5" @if((isset($date['showcount']) && !empty($date['showcount'])) && $date['showcount'] == 5) selected @endif>5</option>
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
    <div class="mws-panel-body no-padding">
    <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>网站名称</th>
                    <th>网站地址</th>
                    <th>网站LOGO</th>
                    <th>申请时间</th>
                    <th>链接状态</th>
                    <th>链接审核</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($links as $k=>$v)
 				<tr>
 					<td>{{ $v['id'] }}</td>
 					<td>{{ $v['title'] }}</td>
 					<td>{{ $v['url'] }}</td>
 					<td><img src="{{ $v['pic'] }}" style='width:100px;height:60px;'></td>
 					<td>{{$v['created_at']}}</td>
 					<td class=" ">
                    	@if($v['status'] == 0)
                      	<button style="color:red;background:black">待审核</button>
                      	@endif
                    </td>
 					<td>
 						<a href="/admin/homelinks/{{$v['id']}}/edit" class='btn btn-warning'>审核</a>
 						<form action="/admin/homelinks/{{$v['id']}}" method="post" style='display:inline-block'>
 							{{ csrf_field()}}
                          	{{ method_field('DELETE')}}
 							<input type="submit" name="" value="不审核" class='btn btn-danger'>
 						</form>
 					</td>
 				</tr>
 				@endforeach
            </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries
            
        </div>
          <div id='page_page'>
                
            </div>
    </div>
</div>
@endsection