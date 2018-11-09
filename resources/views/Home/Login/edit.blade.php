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
		<form class="form-horizontal"  action="/person" method='post'>
			{{ csrf_field()}}
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">用户名：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" placeholder="{{$all['username']}}"  name='username' style="width:500px">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="inputPassword3" placeholder="******"  name='password' style="width:500px">
			    </div>
			 </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">确认密码：</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" id="inputPassword3" placeholder="******" name='repassword' style="width:500px">
			    </div>s
			  </div>
	
			   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">生日:</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="inputPassword3" placeholder="{{ $person['birthday'] or ''}}" name='birthday' style="width:500px">
			    </div>
			  </div>
		    <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">爱好：</label>
			    <div class="col-sm-10">
		      	<input type="text"  id="inputPassword3" class="form-control" placeholder="" name='like'  style="width:500px"  >
			  	</div>
			</div>
		   <div class="form-group">
		    	<label for="inputPassword3" class="col-sm-2 control-label">婚姻状况：</label>
		    	<div class="col-sm-10">
		      	<input type="text"  id="inputPassword3" class="form-control" placeholder="" name='hy'  style="width:500px" >
		      	</div>
		  </div>
		   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">电子邮箱：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="" name='email' style="width:500px">
			    </div>
			  </div>
			   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">电话号码：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="" name='phone' style="width:500px">
			    </div>
			  </div>
		  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">个性签名：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputPassword3" placeholder="" name='qm' style="width:500px">
			    </div>
			  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">修改</button>
		    </div>
		  </div>
</form>

@endsection