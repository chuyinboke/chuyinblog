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
	<!-- 公告修改页 -->
	<div class="mws-panel grid_4">
	    <div class="mws-panel-header">
	        <span>{{ $title}}</span>
	    </div>
	    <div class="mws-panel-body no-padding">
	        <form class="mws-form" action="/admin/notice/{{$date['id']}}" method='post'>
	        	{{ csrf_field()}}
	        	{{ method_field('PUT')}}
	            <fieldset class="mws-form-inline">
	               
	                <div class="mws-form-row bordered">
	                    <label class="mws-form-label">修改标题</label>
	                    <div class="mws-form-item">
	                        <input class="large" type="text" name="title" value="{{$date['title']}}">
	                    </div>
	                </div>
	                <div class="mws-form-row bordered">
	                    <label class="mws-form-label">修改内容</label>
	                    <div class="mws-form-item">
	                <!--       加载编辑器的容器 -->
					    <script id="container" name="count" type="text/plain" > 
					        {!! $date['count']!!} 
					    </script> 
	                  </div>
	                </div>
	            </fieldset>
	             <fieldset class="mws-form-inline">
	                <legend></legend>
	                <div class="mws-form-row bordered">
	                    <label class="mws-form-label">状态</label>
	                    <div class="mws-form-item">
	                        <select class="large" name="status">
	                            <option value='0'>禁用</option>
	                            <option value='1'>开启</option>
	                        </select>
	                    </div>
	                </div>
	            </fieldset>
	          
	            <div class="mws-button-row">
	                <input class="btn btn-info" type="submit" value="修改">
	                <input class="btn btn-danger" type="reset" value="重置">
	            </div>
	        </form>
	    </div>      
	</div>
	
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
 var ue = UE.getEditor('container'); 
 </script> 
@endsection