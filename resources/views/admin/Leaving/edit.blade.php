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
            	<form class="mws-form" action="/admin/Leaving/{{$data['id']}}" method="post"  class="banner-upload">
            		{{ csrf_field() }}
                    {{ method_field('PUT')}}
            		<div class="mws-form-inline">
            			<div class="mws-form-row">
            				<label class="mws-form-label">回复留言</label>
            				<div class="mws-form-item">
            					<input type="text" class="small" name="hcontent">
            				</div>
            			</div>
                    </div>
        <div class="mws-button-row">
            <input type="submit" value="提交" class="btn btn-danger">
            <input type="reset" value="重置" class="btn btn-info">
        </div>
    </form>
@endsection