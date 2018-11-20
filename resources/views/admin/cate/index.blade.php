@extends('admin.clone_index.clone')
<!-- 分类列表页 -->
@section('content')
	<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i> {{ $title or ''}}</span>
    </div>
 <div class="mws-panel-body no-padding">
    <div class="dataTables_wrapper" id="DataTables_Table_1_wrapper" role="grid">

        <form action='/admin/cate' method='get'>
             <div class="dataTables_length" id="DataTables_Table_1_length">
                <label>显示<select name="showcount"  size="1">
                    <option  value="5" @if((isset($date['showcount']) && !empty($date['showcount'])) && $date['showcount'] == 5) selected @endif>5</option>
                    <option  value="10" @if((isset($date['showcount']) && !empty($date['showcount'])) && $date['showcount'] == 10) selected @endif>10</option>
                    <option  value="15"  @if((isset($date['showcount']) && !empty($date['showcount'])) && $date['showcount'] == 15) selected @endif>15</option> 	
                </select> 条</label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
            <label>关键字
                 <input name='search' aria-controls="DataTables_Table_1" type="text" value="">
                <input type="submit" value='搜索' class='btn btn-info'>

             </label>
            </div>

        </form>
        
        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr >
                	<th>ID</th>
                	<th>分类名称</th>
                	<th>添加时间</th>
                	<th>修改时间</th>
                    <th>分类状态</th>
                	<th>操作</th>
                </tr>
            </thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        	@foreach($cate as $k => $v)
        	<tr class="odd">
                    <td class=" ">{{ $v['id']}}</td>
                    <td class=" ">{{ $v['name']}}</td>
                    <td class=" ">{{ $v['created_at']}}</td>
                    <td class=" ">{{ $v['updated_at']}}</td>
                    <td>
                        @if($v['status'] == 0)
                        <button style='color:yellow;background:black'>开启</button>
                        @else
                        <button style='color:red;background:black'>关闭</button>
                        @endif
                    </td>
                    <td class=" ">
                    	<a href="/admin/cate/{{$v['id']}}/edit" class='btn btn-warning'>修改</a>
                    	<!--  <form  style="display:inline-block" action='/admin/cate/{{ $v["id"]}}' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="删除" class='btn btn-danger'>
                        
                    </form> -->
                        <button class='btn btn-danger' onclick="del(this,'{{$v['id']}}')"  id ='{{ $v["id"]}}'>删除</button>
                    </td>
              </tr>
              @endforeach
                </tbody>

            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries  </div>
          	 <div id='page_page'> 
           		 {!! $cate->appends($date)->render() !!}
    
        	</div> 
        </div>
    </div>
      <script type="text/javascript">
            function del(obj,id)
            {
               $.ajax({
                    url : '/admin/cate/destory',
                    type : 'get',
                    data : {'id' : id},
                    success : function(msg){
                        if (msg == 1) {
                            $(obj).parent().parent().remove();
                            alert('删除成功');
                       
                        }else{
                            alert('删除失败');
                        }

                    },
                    dataType : 'html',
                    async: false

               });
            }
            </script>
</div>
@endsection