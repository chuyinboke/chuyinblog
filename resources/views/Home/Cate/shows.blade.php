@extends('Home.clone_index.clone')
@section('content')
	<!-- 帖子详情页 -->
		<div class="inner-content-home">
			<div class="container">

				<div class="row margin-bottom-20">

					<!--用户详情 -->
					
					<div class="col-md-3 col-sm-5">
					@foreach($user as $k => $v)	
						<div class="img-profile text-center">
							<img src="$v->userperson['pic']" class="img-responsive" alt="John Doe">
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
					@endforeach
					</div>
					
					<!-- 文章内荣 -->
					<div class="col-md-6 col-sm-7">
						<h4 class="title">帖子</h4>
						<div class="line-dec"></div>
						@foreach($article as $kk => $vv)
						<div class="grid">
							楼主：{{$v['username']}} &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   发表时间：{{ $vv['created_at']}}
							<hr>
							<div class="grid-item">
								<img src="{{ $vv['image']}}" alt="your-photo" style="width:500px;height:300px;" >
							</div>
							{!! $vv['content'] !!}									
						</div>
						@endforeach
						<hr>
						<div>
							<!-- 评论区 -->
							<form action="/comment/{{$vv['id']}}" method='post'>
								{{ csrf_field()}}
								{{ method_field('PUT') }}
					 			 <!--加载编辑器的容器 -->
							   	<script id="container" name="content" type="text/plain" value=""></script> 
							    <div class="mws-button-row">
            						<input type="submit" value="评论" class="btn btn-danger">
        						</div>
							</form>
						</div>
					</div>
				</div>
			<!-- 评论开始 -->
			@foreach($comment as $ks=>$vs)
				@if($vs['tid'] == $vv['id'])
			  <div class="pl  ">
                    <!-- 用户名 -->
                    <ul class="plbg">
                        <div class="f z13">
                          <span class="jl">用户：{{$vs['uid']}}</span>
                          @if($vs['settop'] == 1)  
                          <span style="float:right;"><img src="/h/images/6.jpg" style="width:30px;height:23px"></span>
                          @elseif($vs['settop'] == 2)
                          <span style="float:right;"><img src="/h/images/5.jpg" style="width:30px;height:23px"></span>
                          @elseif($vs['settop'] == 3)
                          <span style="float:right;"><img src="/h/images/7.jpg" style="width:30px;height:23px"></span>
                          @endif

                        </div>
                        <div class="dr"></div>
                    </ul>
                    <!-- 留言时间 -->
                    <ul>
                       <div class="r">
                          <span class="z13">评论时间：{{$vs['created_at']}}</span>
                      </div>
                        <div class="dr">
                            <span>{!!$vs['content']!!}</span>
                        </div>
                    </ul> 
                     <ul class="plul">
                        <div class="lyhf"></div>
                        <div class="dr"></div>
                     </ul>
                </div>
				@endif
			@endforeach
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