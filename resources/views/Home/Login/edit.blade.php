@extends('Home.clone_index.clone')
@section('content')
		<form class="form-horizontal" >
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">用户名：</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputEmail3" placeholder="{{$all[0]['username']}}"  name='username' style="width:500px">
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
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">头像:</label>
			    <div class="col-sm-10">
			      <input type="file"   placeholder="" name='pic' >
			    </div>
						  </div>
			   <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">生日:</label>
			    <div class="col-sm-10">
			      <input type="date" class="form-control" id="inputPassword3" placeholder="" name='repassword' style="width:500px">
			    </div>
			  </div>
		    <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">爱好：</label>
			    <div class="col-sm-10">
			    <input type="checkbox" name="che" value='1' checked>运动 &nbsp;
			     <input type="checkbox" name="che" value='2'>旅游 &nbsp;
			     <input type="checkbox" name="che" value='3'>游泳 &nbsp;
			     <input type="checkbox" name="che" value='4'>看书 &nbsp;
			     <input type="checkbox" name="che" value='5'>美食 &nbsp;
			  	</div>
			</div>
		   <div class="form-group">
		    	<label for="inputPassword3" class="col-sm-2 control-label">婚姻状况：</label>
		    	<div class="col-sm-10">
		      	<input type="radio"  id="inputPassword3" placeholder="" name='hy[]' value='1' checked>单身狗 &nbsp;
		      	<input type="radio"  id="inputPassword3" placeholder="" name='hy[]' value='2'>已婚 &nbsp;
		    </div>
		  </div>
		  <div class="form-group">
			    <label for="inputPassword3" class="col-sm-2 control-label">个性签名</label>
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