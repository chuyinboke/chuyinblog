@extends('admin.clone_index.clone')
@section('content')
<div class="mws-panel grid_8">
  		<div class="mws-panel-header">
        	<span><i class="icon-table"></i>{{ $title or '' }}</span>
   	 	</div>
     <div class="dataTables_wrapper" id="DataTables_Table_1_wrapper" role="grid">


            <form action='/admin/rotation' method='get'>
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
                    <th>图片名字</th>
                    <th>轮播图片</th>
                    <th>图片描述</th>
                    <th>图片状态</th>
                    <th>图片操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($rotation as $k=>$v)
         		<tr>
         			<td>{{ $v['id'] }}</td>
         			<td>{{ $v['name'] }}</td>
         			<td><img src="{{ $v['image'] }}" style="width:150px;height:80px"></td>
         			<td>{{ $v['describe'] }}</td>
         			 <td>
                        @if($v['status'] == 1)
                        <button style='color:yellow;background:black'>开启</button>
                        @else
                        <button style='color:red;background:black'>关闭</button>
                        @endif
                    </td>
                      <td>
                        <a href="/admin/rotation/{{$v['id']}}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/rotation/{{$v['id']}}" method="post" style="display:inline-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                           <input type="submit" value="删除" class="btn btn-danger"> 
                        </form>
                    </td>
         		</tr>
         		@endforeach
            </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">{{ date('Y年m月d日 H:i',time()) }}
                
        </div>
        <div id='page_page'>
              {!! $rotation->render() !!}  
        </div>
    	</div>
	</div>    
</div>
@endsection