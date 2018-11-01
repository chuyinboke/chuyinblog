@extends('admin.clone_index.clone');

@section('content')
<!-- 用户的列表页 -->
 <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 用户列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div class="dataTables_wrapper" id="DataTables_Table_1_wrapper" role="grid">

            <form action='/admin/user' method='get'>
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
           
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
               <tr>
                   <th>ID</th>
                   <th>用户名</th>
                   <th>手机号</th>
                   <th>邮箱</th>
                   <th>注册时间</th>
                   <th>修改时间</th>
                   <th>权限</th>
                   <th>操作</th>
               </tr>
            </thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
            
                    @foreach($user as $k=>$v)
                <tr class="odd">
                    <td class="">{{ $v['id']}}</td>
                    <td class="">{{ $v['username']}}</td>
                    <td>{{ $v['phone']}}</td>
                    <td>{{ $v['email']}}</td>
                    <td>{{ $v['created_at']}}</td>
                    <td>{{ $v['updated_at']}}</td>
                    <td>{{ $v['status'] == 1 ? '普通用户' : '管理员'}}</td>
                  
                    <td> 
                         <a href="/admin/user/{{ $v['id']}}/edit" class='btn btn-warning'>修改</a>                        
                        <form  style="display:inline-block" action='/admin/user/{{ $v["id"]}}' method='post'>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class='btn btn-danger'>
                            
                        </form>
                     
                    </td>
                </tr>
                  @endforeach
            </tbody>
        </table>
        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries
            
        </div>
          <div id='page_page'>
                {!! $user->appends($date)->render() !!}
        
            </div>
      
    </div>
    
    </div>
</div>
@endsection
