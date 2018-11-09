@extends('admin.clone_index.clone')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/homelinks/{{ $data['id'] }}" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
     		{{ method_field('PUT') }}
   
               <div class="mws-form-inline">
                   <div class="mws-form-row">
                        <label class="mws-form-label"><h5>链接状态</h5></label>
                        <div class="mws-form-item">
                            <h5><input type="radio" value="1" name="status">通过审核</h5>
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