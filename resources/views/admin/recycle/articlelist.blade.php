@extends('admin.clone_index.clone')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>{{ $title or '' }}</span>
    </div>
    <div class="mws-panel-body no-padding">
    <div class="dataTables_wrapper" id="DataTables_Table_1_wrapper" role="grid">
            <form action='/recyclewz' method='get'>
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
                    <th>文章标题</th>
                    <th>文章作者</th>
                    <th>文章来源</th>
                    <th>添加时间</th>
                    <th>删除时间</th>
                    <th>操作</th>
                </tr>
            </thead>
               
            <tbody>
            @foreach($article as $k=>$v )
                <tr>
                    <td>{{ $v['id'] }}</td>
                    <td>{{ $v['title'] }}</td>
                    <td>{{ $v['editrs'] }}</td>
                    <td>{{ $v['source'] }}</td>
                    <td>{{ $v['created_at'] }}</td>
                    <td>{{ $v['updated_at'] }}</td>
                    <td>
                    	<a href="/recyclewz/{{ $v['id'] }}/edit" class="btn btn-warning">恢复</a>
                        <button class='btn btn-danger' onclick="del(this,'{{$v['id']}}')"  id ='{{ $v["id"]}}'>删除</button>
                    </td>
                </tr>
            @endforeach    
            </tbody>
        </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">
                {{ date('Y年m月d日 H:i',time()) }}
            </div>
            <div id='page_page'>
                {!! $article->appends($date)->render() !!}
            </div> 
        </div>  
    </div>
      <script type="text/javascript">
            function del(obj,id)
            {
               $.ajax({
                    url : '/recyclewz/destory',
                    type : 'get',
                    data : {'id' : id},
                    success : function(msg){
                        if (msg == 'success') {
                           
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
