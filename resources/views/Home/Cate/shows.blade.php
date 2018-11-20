@extends('Home.clone_index.clone')
@section('content')
	<!-- 帖子详情页 -->
		<div class="inner-content-home">
			<div class="container">

				<div class="row margin-bottom-20">

					<!-- Profile info -->
					<div class="col-md-3 col-sm-5">
						@foreach($user as $k => $v)
						<div class="img-profile text-center">
							<img src="/h/images/2.jpg" class="img-responsive" alt="John Doe">
							<div class="profile-name">
								
							</div>
						</div>

						<h4 class="title"> 个人信息</h4>
						<div class="line-dec"></div>

						<ul class="list-group">
							<li class="list-group-item"><b>博主昵称：</b> {{ $v['username']}}</li>
							<li class="list-group-item"><a href="#"><b>生日：</b> <span class="badge">{{ $v->userperson['birthday']}}</span></a></li>
							<li class="list-group-item"><b>爱好：</b><span class="badge">
								@if($v->userperson['like'] == 1) 旅游@endif
									@if($v->userperson['like'] == 2) 美食@endif
									@if($v->userperson['like'] == 3) 看书@endif
							</span></li>
							<li class="list-group-item"><b>婚姻状况：</b> <span class="badge">
									@if( $v->userperson['hy'] ==1) 单身狗 @endif
							 		@if( $v->userperson['hy'] ==2) 已婚 @endif
							 		@if( $v->userperson['hy'] ==3) 隐藏 @endif

							</span></li>
							<li class="list-group-item"><b>电子邮箱：</b> {{ $v['email']}}</li>
							<li class="list-group-item"><b>个性签名：</b> {{ $v->userperson['qm']}}</li>

						</ul>
							
						<!-- <a href="#" class="btn btn-block btn-success">关注</a> -->

					</div>

					<div class="col-md-6 col-sm-7">
						<h4 class="title">帖子</h4>
						<div class="line-dec"></div>
						@foreach($article as $kk => $vv)
						<div class="grid" style="width:400px;height:500px">
							楼主：{{$v['username']}} &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   发表时间：{{ $vv['created_at']}}
							<hr>
							<div class="grid-item">
									<img src="{{ $vv['image']}}" alt="your-photo" " width="500" height="300">
							</div>
							{!! $vv['content'] !!}									
						</div>
						<hr>
						@endforeach
						<div>
							<h4>评论：</h4>
								<form action='' method='post'>
									<!-- 评论框 -->
					 			 	<!--       加载编辑器的容器 -->
							   		 <script id="container" name="count" type="text/plain"   value="">
							        
							    	</script> 
							    	<input type="submit" value="发表">
								</form>
						</div>
						<div style='height:300px'>
							<!-- 评论区 -->
						</div>
					</div>
					@endforeach
					
				</div>
				
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