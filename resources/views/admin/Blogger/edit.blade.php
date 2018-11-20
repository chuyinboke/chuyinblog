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
  <!-- 添加博主简介 -->
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    <span>{{ $title or '' }}</span>
</div>
    <div class="mws-panel-body no-padding">
            	<form class="mws-form" action="/admin/Blogger/{{$data['id']}}" method="post" enctype="multipart/form-data" class="banner-upload">
            		{{ csrf_field() }}
                    {{ method_field('PUT')}}
            		<div class="mws-form-inline">
            			<div class="mws-form-row">
            				<label class="mws-form-label">博主名字</label>
            				<div class="mws-form-item">
            					<input type="text" class="small" name="name" value="{{$data['name']}}">
            				</div>
            			</div>
                        <div class="mws-form-row">
                            <label class="mws-form-label">博主性别</label>
                            <div class="mws-form-item">
                                <input type="text" class="small" name="sex" value="{{$data['sex']}}">
                            </div>
                        </div>
                            <div class="mws-form-row">
                            <label class="mws-form-label">博主年龄</label>
                            <div class="mws-form-item">
                                <input type="text" class="small" name="age" value="{{$data['age']}}">
                            </div>
                        </div>
                            <div class="mws-form-row">
                            <label class="mws-form-label">博主身高</label>
                            <div class="mws-form-item">
                                <input type="text" class="small" name="height" value="{{$data['height']}}">
                            </div>
                        </div>
                            <div class="mws-form-row">
                            <label class="mws-form-label">博主擅长</label>
                            <div class="mws-form-item">
                                <input type="text" class="small" name="Begoodat" value="{{$data['Begoodat']}}">
                            </div>
                        </div>
            			<div class="mws-form-row">
            				<label class="mws-form-label">博主简介</label>
            				<div class="mws-form-item">
            					<input type="text" class="small" name="editrs" value="{{$data['editrs']}}">
            				</div>
            			</div>
            			<div class="mws-form-inline">
                            <div class="mws-form-row">
                             <label class="mws-form-label">博主图片</label>
                                <div class="mws-form-item">
                                    <input type="file" class="small" name="image" value="{{$data['image']}}">
                                </div>
                            </div>
                        </div>
                        <div class="mws-form-row">
                        <label class="mws-form-label">博主留言</label>
                        <div class="mws-form-item">
                             <!-- 加载编辑器的容器 -->
                            <textarea  type="text/plain" class="small" name="content">
                                {!! $data['content'] !!}
                            </textarea>
                        </div>
                    </div>
            			<div class="mws-form-row">
            				<label class="mws-form-label">简介开关</label>
            				<div class="mws-form-item">
            					<select class="small" name='status'>
                                    <option value='3'>----请选择-----</option>
                                    <option value='1'>开启</option>
                                    <option value='0'>关闭</option>
            					</select>
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
@endsection