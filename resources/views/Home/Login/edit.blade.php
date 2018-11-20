@extends('Home.clone_index.clone')
@section('content')
<!-- 显示验证错误信息 -->
	@if (count($errors) > 0)
    <div class="alert alert-warning alert-dismissible">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> 
	@endif
		<form class="form-horizontal"  method='post' action='/person' enctype="multipart/form-data" >
			{{ csrf_field()}}
			    <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">头像:</label>
			    <div class="col-sm-10">
					<img src="{{ $all->userperson['pic']}}" alt='' style="width:200px;height:200px;border-radius: 50%"/>
					<input type="file" name="pic"  >
			  </div>
			</div>
			    <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">用户名：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" value="{{$all['username']}}"  name='username' style="width:500px" disabled=true>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">生日:</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="inputPassword3" placeholder="{{ $all->userperson['birthday'] or ''}}" name='birthday' style="width:500px">
			    </div>
			  </div>
			 <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">爱好:</label>
			    <div class="col-sm-10">
		    	<label class="checkbox-inline">
					  <input type="radio" id="inlineCheckbox1" name='like' value="1"> 游泳
					</label>
					<label class="checkbox-inline">
					  <input type="radio" id="inlineCheckbox2" name='like' value="2">美食 
					</label>
					<label class="checkbox-inline">
					  <input type="radio" id="inlineCheckbox3" name='like' value="3">看书 
					</label>
				</div>
		  </div>
		   <div class="form-group">
		    	<label for="inputPassword3" class="col-sm-2 control-label">婚姻状况：</label>
		    	<div class="col-sm-10">
		      	<label class="radio-inline">
				  <input type="radio" name="hy" id="inlineRadio1" value="1"> 单身狗
				</label>
				<label class="radio-inline">
				  <input type="radio" name="hy" id="inlineRadio2" value="2"> 已婚
				</label>
				<label class="radio-inline">
				  <input type="radio" name="hy" id="inlineRadio3" value="3"> 隐藏
				</label>
		      	</div>
		  </div>
		   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">电子邮箱：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="{{$all['email']}}" name='email' style="width:500px">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">电话号码：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="{{ $all['phone']}}" name='phone' style="width:500px">
			    </div>
			  </div>
		  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">个性签名：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="{{$all->userperson['qm']}}" name='qm' style="width:500px">
			    </div>
			  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">修改</button>
		    </div>
		  </div>
</form>
<script type="text/javascript">
	
	//一般直接写在一个js文件中
		  var layer = layui.layer,form = layui.form;
	$("img").error(function(){
　　//当图片加载失败时，你要进行的操作
	$(this).attr('src','/h/images/2.jpg');
});

	// layui.use('upload', function(){
	//   var upload = layui.upload;
	//  }
</script>
@endsection