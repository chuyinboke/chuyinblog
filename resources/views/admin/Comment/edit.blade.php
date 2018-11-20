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
            <span>{{ $title or '' }}</span>
        </div>
            <div class="mws-panel-body no-padding">
                <form class="mws-form" action="/admin/comment/{{ $data['id'] }}" method="post" enctype="multipart/form-data" class="banner-upload">
                    		{{ csrf_field() }}
                    		{{ method_field('PUT')}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">评论作者</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="uid" value="{{ $data['uid'] }}">
                    				</div>
                    			</div>
                    		   <div class="mws-form-row">
                                    <label class="mws-form-label">评论文章</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="small" name="tid" value="{{ $data['tid'] }}">
                                    </div>
                                </div>
                    			<div>
                    				<div class="mws-form-row">
                    				<label class="mws-form-label">评论内容</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="content" value="{!! $data['content'] !!}">
                    				</div>
                    				</div>
                    			</div>	
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">文章分类</label>
                    				<div class="mws-form-item">
                    					<select class="small" name='settop' value="{{ $data['fenlei'] }}">
                    						<option value='0'>----请选择-----</option>
                                            <option value='1'>好</option>
                                            <option value='2'>很好</option>
                                            <option value='3'>非常好</option>
                    					</select>
                    				</div>
                    			</div>
                    
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn btn-info">
                </div>
            </form>
        </div>    	
</div>  
@endsection