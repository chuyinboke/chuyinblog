@extends('admin.clone_index.clone')
@section('content')
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
                 <th>用户</th>
                 <th>文章</th>
                 <th>内容</th>
                 <th>置顶</th>
                 <th>评论时间</th>
                 <th>操作</th>
                </tr>
            </thead>
               
            <tbody>
            	@foreach($comment as $k=>$v)
             	<tr>
             		<td>{{$v['id']}}</td>
             		<td>{{$v['uid']}}</td>
             		<td>{{$v['tid']}}</td>
             		<td>
             			@if($v['settop'] == 0)
             				<span>没置顶</span>
             			@elseif($v['settop'] == 1)
             				<span>第三</span>
             			@elseif($v['settop'] == 2)
             				<span>第二</span>
             			@elseif($v['settop'] == 3)
             				<span>第一</span>
             			@endif	
             		</td>
             		<td>{!!$v['content']!!}</td>
             		<td>{{$v['created_at']}}</td>
             		<td>
             			<a href="/admin/comment/{{$v['id']}}/edit" class="btn btn-warning">加精</a>
             			<form action="/admin/comment/{{ $v['id'] }}" method="post" style="display:inline-block"> 
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
             {!! $comment->render() !!}
            </div> 
        </div>  
    </div>
</div>
@endsection