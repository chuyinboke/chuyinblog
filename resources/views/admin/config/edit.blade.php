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
    	<span><i class="icon-ok"></i> {{ $name}}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" id="mws-validate" action="/config" method='post' enctype="multipart/form-data">
    		{{ csrf_field()}}
        	<div class="mws-form-message error" id="mws-validate-error" style="display:none;"></div>
        	<div class="mws-form-inline">
            	<div class="mws-form-row">
                	<label class="mws-form-label">标题</label>
                	<div class="mws-form-item">
                    	<input name="title" class="required large" type="text" value="{{ $config['title']}}">
                    </div>
                </div>
                <div class="mws-form-row">
                	<label class="mws-form-label">域名</label>
                	<div class="mws-form-item">
                    	<input  class="required large" type="text" value="www.cy.com" disabled="true" style="cursor:no-drop">
                    </div>
                </div>
                <div class="mws-form-row">
                	<label class="mws-form-label">LOGO</label>
                	<div class="mws-form-item">
                    	<div class="fileinput-holder" style="position: relative;">
                    		<input name="pic" class="required" style="margin: 0px; top: 0px; right: 0px; font-size: 999px; filter: none; position: absolute; z-index: 999; cursor: pointer; opacity: 0;width:500px" type="file">
                    	</div>
                        <label class="error" style="display:none" for="picture" generated="true"></label>
                        <div style="width:150px;height:150px"><img src="{{ $config['logo']}}"></div>
                    </div>
                </div>
            	<div class="mws-form-row">
                	<label class="mws-form-label">版权</label>
                	<div class="mws-form-item">
                    	<input name="copyright" class="required large" type="text"  value="{{ $config['copyright']}}" style="height:150px">
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item">
                    	<ul class="mws-form-list">
                        	<li><input name="status" class="required" id="gender_male" type="radio" value='1' @if($config['status'] == 1) checked @endif> <label for="gender_male">开启网站</label></li>
                        	<li><input name="status" id="gender_female" type="radio" value='0' @if($config['status'] == 0) checked @endif> <label for="gender_female">关闭网站</label></li>
                        </ul>
                        <label class="error plain" style="display:none" for="gender" generated="true"></label>
    				</div>
    			</div>
            </div>
            <div class="mws-button-row">
            	<input class="btn btn-danger" type="submit" value="修改">
            </div>
        </form>
    </div>    	
</div>

@endsection	