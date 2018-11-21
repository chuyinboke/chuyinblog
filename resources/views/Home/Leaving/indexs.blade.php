@extends('Home.clone_index.clone')
@section('content')
	<div>
	<div class="">
		<h4 class="title">{{$title or ''}}</h4>
		<div class="col-sm-12">
		</div>
	</div>
	@foreach($leaving as $k=>$v)
		<div class="pl " style="width:1000px;margin:0px auto">
			<!-- 用户名 -->
			<ul class="plbg">
			    <div class="f z13">
			      <span class="jl">用户：{{$v['uname']}}</span>
			    </div>
			    <div class="dr">留言时间：《{{$v['created_at']}}》</div>
			</ul>
			<!-- 留言时间 -->
			<ul>
			   <div class="r">
			      <span class="z13">内容:{{$v['content']}}</span>
			  </div>
			    <div class="dr">
			        <span></span>
			    </div>
			</ul> 
			 <ul class="plul">
			    <div class="lyhf">回复:{{$v['hcontent']}}</div>
			    <div class="dr">回复时间：《{{$v['updated_at']}}》</div>
			 </ul>
		</div>
	@endforeach	
	</div>
@endsection