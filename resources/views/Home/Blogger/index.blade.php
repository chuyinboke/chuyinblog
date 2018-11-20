@extends('Home.clone_index.clone')
@section('content')
<div class="row">
	<div class="col-md-1"></div>
 	<div class="col-md-10">
 		<h2 class="title">{{ $title or '' }}</h2>
 	</div>
</div>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-0"></div>
  <div class="col-md-4">
  	<img src="{{$blogger['image']}}" alt="..." class="img-thumbnail">
  </div>
  <div class="col-md-4">
  	<h4 class="title">关于我</h4>
  </div>
  <div class="col-md-6">
  	<div class="col-md-1">姓名</div>
  	<p>{{$blogger['name']}}</p><br>
  	<div class="col-md-1">性别</div>
  	<p>{{$blogger['sex']}}</p><br>
  	<div class="col-md-1">年龄</div>
  	<p>{{$blogger['age']}}</p><br>
  	<div class="col-md-1">身高</div>
  	<p>{{$blogger['height']}}</p><br>
  	<div class="col-md-1">擅长</div>
  	<p>{{$blogger['Begoodat']}}</p><br>
  </div>
</div>
<div class="row">
	<div class="col-md-1"></div>
 	    <div class="col-md-10">
 		 <h4 class="title">博主简介</h4>
 	</div>
   	<div class="col-md-6">
		    <div class="col-md-3"></div>
  		  <p>{{$blogger['editrs']}}</p>
  	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
 	<div class="col-md-10">
 		<h4 class="title">博主经历</h4>
 	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-1"></div>
 	<div class="col-md-6">
 		<p>{{$blogger['content']}}</p>
 	</div>
</div>
@endsection