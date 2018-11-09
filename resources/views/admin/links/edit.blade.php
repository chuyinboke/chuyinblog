@extends('admin.clone_index.clone')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/links/{{ $data['id'] }}" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
     		{{ method_field('PUT') }}
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">网站名称</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="title" value="{{ $data['title'] }}">
                         </div>
                    </div>
                </div> 
               <div class="mws-form-inline">
                     <div class="mws-form-row">
                         <label class="mws-form-label">网站地址</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="url" value="{{ $data['url'] }}">
                         </div>
                    </div>
               </div>    
               <div class="mws-form-inline">
           				<div class="mws-form-row">
           					<label class="mws-form-label">网站LOGO</label>
           					<div class="mws-form-item">
           						<input type="file" class="small" name="pic">
           					</div>
           				</div>
               </div>
               <div class="mws-form-inline">
                   <div class="mws-form-row">
                        <label class="mws-form-label">链接状态</label>
                        <div class="mws-form-item">
                            <input type="radio" value="1" name="status" value="{{ $data['status'] }}">启用
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
</div>
@endsection