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
	<!-- 公告添加页 -->
	<div class="mws-panel grid_4">
	    <div class="mws-panel-header">
	        <span>{{ $title}}</span>
	    </div>
	    <div class="mws-panel-body no-padding">
	        <form class="mws-form" action="/admin/notice" method='post'>
	        	{{ csrf_field()}}
	            <fieldset class="mws-form-inline">
	               
	                <div class="mws-form-row bordered">
	                    <label class="mws-form-label">标题</label>
	                    <div class="mws-form-item">
	                        <input class="large" type="text" name="title">
	                    </div>
	                </div>
	                <div class="mws-form-row bordered">
	                    <label class="mws-form-label">内容</label>
	                    <div class="mws-form-item">
	                <!--       加载编辑器的容器 -->
					    <script id="container" name="count" type="text/plain"   value="">
					        
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
	                <input class="btn btn-info" type="submit" value="添加">
	                <input class="btn btn-danger" type="reset" value="重置">
	            </div>
	        </form>
	    </div>      
	</div>
	<div class="mws-panel grid_4">
	    <div class="mws-panel-header">
	        <span>公告注意事项</span>
	    </div>
	    <div class="mws-panel-body no-padding">
	        <form class="mws-form" action="form_layouts.html" style="height:550px">
	        	<div style="text-align: center">
	        		<h4>公告的正文一般包括因由、事项和结语三个内容。</h4>
		        	<h4>结语因由要求用简要的语言写出公告的依据、原因、目的。</h4>
		        	<h4>事项是公告的主体，要求明确写出公告的决定和要求。</h4>
		           <h4>一般用较为客气德礼貌用语，体现公告发布方对用户的尊重合友善。</h4>
	        	</div>
	        	
	            </fieldset>
	           
	            
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