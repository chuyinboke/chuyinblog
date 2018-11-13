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
<!-- 添加页面 -->
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/album" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
               <div class="mws-form-inline">
                     <div class="mws-form-row">
                         <label class="mws-form-label">图片名字</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="name">
                         </div>
                    </div>
               </div>
                <div class="mws-form-inline">
                     <div class="mws-form-row">
                         <label class="mws-form-label">图片描述</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="describe">
                         </div>
                    </div>
               </div>     
               <div class="mws-form-inline">
     				<div class="mws-form-row">
     					<label class="mws-form-label">添加图片</label>
     					<div class="mws-form-item">
     						<input type="file" class="small" name="image">
     					</div>
     				</div>
               </div>
               <div class="mws-form-inline">
                   <div class="mws-form-row">
                        <label class="mws-form-label">相册状态</label>
                        <div class="mws-form-item">
                            <input type="radio" value="1" name="status">启用
                            &nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp
                            <input type="radio" value="0" name="status">禁用
                        </div>
                    </div>
               </div>
     			<div class="mws-form-row">
     				<input type="submit" value="提交" id="img_upload" class="btn btn-danger">
     				<input type="reset" value="重置" class="btn">
     			</div>
     	</form>
     </div> 
	




@endsection