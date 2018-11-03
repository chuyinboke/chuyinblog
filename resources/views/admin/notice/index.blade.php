@extends('admin.clone_index.clone')

@section('content')
    <div class="mws-panel grid_8">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> {{$title or ''}}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <form action='/admin/notice' method='get'>
                            <div class="dataTables_wrapper" id="DataTables_Table_1_wrapper" role="grid">
                                <div class="dataTables_length" id="DataTables_Table_1_length">
                                    <label>显示<select name="showcount" aria-controls="DataTables_Table_1" size="1">
                                        <option  value="5" @if((isset($request['showcount']) && !empty($request['showcount'])) && $request['showcount'] == 5) selected @endif >5</option>
                                        <option value="10" @if((isset($request['showcount']) && !empty($request['showcount'])) && $request['showcount'] == 10) selected @endif>10</option>
                                        <option value="15" @if((isset($request['showcount']) && !empty($request['showcount'])) && $request['showcount'] == 15) selected @endif>15</option>
                                    </select> 条</label>
                                </div>
                            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                                    <label>关键字: <input aria-controls="DataTables_Table_1" type="text" name='search' value='{{ $request['search'] or ''}}'>
                                        <input type="submit"value="搜索" class='btn btn-info'>
                                    </label>

                            </div>
                        </form>
                   
                     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
                                    <th>选项</th>
                                    <th>ID</th>
                                    <th>标题</th>
                                    <th>内容</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                             @foreach($notice as $k => $v)
                            <tr class="odd">
                                    <td><input type="checkbox" name="che[]"></td>
                                    <td class=" ">{{ $v['id'] }}</td>
                                    <td class=" ">{{ $v['title']}}</td>
                                    <td class=" ">{!! $v['count']!!}</td>
                                    <td class=" ">{{ $v['created_at']}}</td>
                                    <td>{{ $v['updated_at']}}</td>
                                    <td class=" ">
                                        @if($v['status'] == 0)
                                        <button style="color:red;background:black">禁用</button>
                                        @else
                                        <button style="color:yellow;background:black">开启</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/notice/{{ $v['id']}}/edit" class='btn btn-warning'>修改</a>
                                           
                                        <form style='display:inline-block'  method='post' id='form2'  action="/admin/notice/{{$v['id']}}">
                                            {{ csrf_field()}}
                                            {{ method_field('DELETE')}}
                                            <input type="submit" value='删除' class='btn btn-danger' onclick="return confirm('确定要删除吗？')">
                                            
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
                        <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                          
                            <span id='page_page' style='background:gray'>
                                {!! $notice->appends($request)->render() !!}
                            </span>
                           
                        </div>
                    </div>
                </div>
         </div>
<script type="text/javascript">
</script>
@endsection