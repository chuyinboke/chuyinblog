@extends('Home.clone_index.clone')
@section('content')
<!-- Navbar menu -->
<nav class="navbar navbar-default nav-top">
	<div class="container-fluid">
		<!-- Responsive button -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- 分类 -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
			<ul class="nav navbar-nav">
				<!-- 导航栏 -->
				@foreach($category as $v)
				<li class="dropdown">
					@if($v['pid'] == 0)
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
						{{ $v['name']}}
						<span class="caret"></span>
					</a>
					@endif

					<ul class="dropdown-menu">
						@foreach($categorys as $key=>$value)
							@if($v['id'] == $value['pid'])
							<li><a href="/cate/{{ $value['id']}}">{{ $value['name'] }}</a></li>
							@endif
						@endforeach
					</ul>
					
				</li>
				@endforeach
				<li><a href="/Blogger">关于博主</a></li>
				<li>
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">留言板</a>
					<ul class="dropdown-menu">
						<li><a href="/Leaving/create">留言板</a></li>
						<li><a href="/Leaving">留言列表</a></li>
					</ul>
				</li>
			</ul>
			
			
		</div>
	</div>
</nav>
<!-- Principal image with search -->
<div class="full-header">
	<div class="overlay"></div>
	<div class="search">
		
	</div>
</div>

<!-- Page container -->
<div class="inner-content-home">
	<div class="container">

		<div class="row margin-bottom-20">

			<!-- Top categories -->
			<div class="col-sm-8">
				<h4 class="title"></h4>
				<div class="line-dec"></div>

				<!-- Top categories slider -->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- 轮播按钮 -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						<li data-target="#carousel-example-generic" data-slide-to="3"></li>
						<li data-target="#carousel-example-generic" data-slide-to="4"></li>
					</ol>

					<!-- 轮播框 -->
					<div class="carousel-inner" role="listbox">
						<!-- 轮播图内容 -->
						<div class="item active">
							<img src="/h/images/slider/4.jpg" alt="Image 1">
							<div class="carousel-caption">
								树荫下的MlKU
							</div>
						</div>

						<!-- 轮播图内容 -->
						@foreach($rotation as $k=>$v)
						<div class="item">
							<img src="{{$v['image']}}" alt="Image 2">
							<div class="carousel-caption">
								{{$v['describe']}}
							</div>
						</div>
						@endforeach
						
					</div>

					<!--  轮播左按钮 -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left fa fa-angle-left" aria-hidden="true"></span>
					</a>
					<!--  轮播右按钮 -->
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right fa fa-angle-right" aria-hidden="true"></span>
					</a>
				</div>
			</div>

			<!-- 每日公告 -->
			<div class="col-sm-4">
				<h4 class="title">每日贴心提示</h4>
				<div class="line-dec"></div>

				<!-- 提示内容 -->
				<div class="thumbnail">
					<img src="/h/images/tip.jpeg.jpg" alt="Tip of the day">
					<div class="caption">
						@foreach($notice as $k => $v)
							@if($v['status'] == 1)
								<h3>{{ $v['title']}}</h3>
							
								<p class="sm-hide">
									{!! $v['count']!!}
								</p>
							@endif
						@endforeach
					</div>
				</div>

			</div>
		</div>

		<!-- 提示注册栏 -->
		<div class="row">

			<!-- 小小提示 -->
			<div class="col-sm-8">
				<div class="alert alert-warning" role="alert"><b>40%</b> of discount in <a href="#"><b>Nature</b></a> category</div>
			</div>

			<!-- 注册按钮 -->
			<div class="col-sm-4">
				<button type="submit" class="btn btn-block btn-success register-btn">现在注册</button>
			</div>
		</div>

<!-- 图片展示页面 -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="title">最近的图片展示</h4>
				<div class="line-dec"></div>

				<!-- 图片框架 -->
				<div id="recent-photos">
					<!-- 图片展示 -->
					<div class="item">
						<!-- 图片地址 -->
						<img src="/h/images/tip.jpeg.jpg">
						<div class="ribbon"><span>你好</span></div>
					</div>
					@foreach($album as $k=>$v)
					<div class="item">
						<!-- 图片地址 -->
						<img src="{{ $v['image'] }}" style="width:279px;height:180px;">
						<div class="ribbon"><span>{{$v['describe']}}</span></div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		

		<!-- 文章详情 -->
		<div class="">
			<h4 class="title">最近的文章展示</h4>
			<div class="col-sm-12">
				<div class="line-dec"></div>
			</div>
		</div>
		<!-- 最近文章的显示 -->
		@foreach($article as $k=>$v)
		<div class="media photo-list">
			<!-- 文章图片显示 -->
			<div class="media-left">
				<a href="#">
					<img class="media-object photo-list-image" alt="List photo" src="{{$v['image']}}">
				</a>
			</div>
			<!-- 文章内容区 -->

			<div class="media-body">
				<div class="row">
					<!-- 标题来源详情 -->
					<div class="col-sm-8">
						<h4 class="media-heading photo-list-title">
							标题: {{$v['title']}}<span class="badge">作者: {{$v['editrs']}}</span>
						</h4>
						<p class="text-justify photo-list-description">
							来源:{{$v['source']}}
						</p>
					</div>
					<!-- 文章按钮 -->
					<div class="col-sm-4">
						<a class="btn btn-block btn-success" href="/cate/shows/{{ $v['id']}}">查看详情</a>
						<a class="btn btn-block btn-primary" href="/cate/shows/{{ $v['id']}}">发表评论</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
	<!-- 尾部信息 -->
<div class="container">
	<div id="footer">
		<div class="row">
			<!-- 尾部信息栏 3 -->
			<div class="col-sm-4">
				<h4 class="footer-title">友情连接</h4>
				<div class="line-dec"><a href="/links/create"><h5>添加友情链接</h5></a></div>
				<ul>
					@foreach($links as $k=>$v)
						@if($v['status'] == 1)
						<li>
							<a href="{{$v['url']}}" target="_blank" title="{{$v['title']}}">
								<img src="{{$v['pic']}}" style="width:100px;height:40px;">
							</a>
						</li>
						@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection