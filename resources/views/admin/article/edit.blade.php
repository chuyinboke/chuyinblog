@extends('admin.clone_index.clone')
@section('content')
<div class="mws-panel grid_8">
      	<div class="mws-panel-header">
            <span>{{ $title or '' }}</span>
        </div>
            <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/article/{{ $data['id'] }}" method="post">
                    		{{ csrf_field() }}
                    		{{ method_field('PUT')}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">文章标题</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="title" value="{{ $data['title'] }}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">文章作者</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="editrs" value="{{ $data['editrs'] }}">
                    				</div>
                    			</div>
                    				<div class="mws-form-row">
                    				<label class="mws-form-label">文章来源</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="source" value="{{ $data['source'] }}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">文章分类</label>
                    				<div class="mws-form-item">
                    					<select class="small" name='fenlei' value="{{ $data['fenlei'] }}">
                    						<option value='0'>----请选择-----</option>
                                            @foreach($cate as $k => $v)
                                            <option value='{{ $v['id']}}'>{{ $v['name']}}</option>
                                            @endforeach
                    					</select>
                    				</div>
                    			</div>
                    		<div class="mws-form-row">
                    			<label class="mws-form-label">文章内容</label>
                    			<div class="mws-form-item">
	                    			 <!-- 加载编辑器的容器 -->
								    <script id="container" name="content" type="text/plain" class="small" name="content" value="{{ $data['content'] }}">
								        
								    </script>
		                    	</div>
                    		</div>
                    </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn btn-info">
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