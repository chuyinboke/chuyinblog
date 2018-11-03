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
        	<span>{{ $title or ''}}</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/cate/{{ $date['id']}}" method='post'>
        		{{ csrf_field()}}
                {{ method_field('PUT')}}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">分类修改</label>
        				<div class="mws-form-item">
        					<input class="small" type="text" name='name' value='{{ $date['name']}}'>
        					<span id='span'></span>
        				</div>
        			</div>
        			<div class="mws-form-row">
                        <label class="mws-form-label">所属类别</label>
                        <div class="mws-form-item">
                            <select class="small" name='pid'>
                                <option value='0'>----请选择-----</option>
                               @foreach($cates as $k=>$v)
                              <option value='{{ $v["id"]}}' @if($date['pid'] == $v['id']) selected @endif>{{ $v['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">分类状态</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="radio" value='0' @if($date['status'] ==0) checked @endif name='status' id='q1'> <label for='q1'>开启</label></li>
                                <li><input type="radio" value='1' @if($date['status'] ==1) checked @endif name='status' id='q2'> <label for='q2'>关闭</label></li>
                            </ul>
                        </div>
                    </div>
        			
        			
        		<div class="mws-button-row">
        			<input class="btn btn-info" type="submit" value="修改">
        			<input class="btn btn-danger " type="reset" value="重置">
        		</div>
        	</form>
        </div>    	
    </div>
    <script type="text/javascript">
    	$('input[name=name]').mousedown(function(){
    		$('span[id=span]').html('<span class="mws-panel-header" style="color:yellow;background:black">  请输入汉字</span>');
    	});
    	$('[name=title]').mouseup(function(){
    		$('span[id=span]').html('');

    	});
    </script>
@endsection
