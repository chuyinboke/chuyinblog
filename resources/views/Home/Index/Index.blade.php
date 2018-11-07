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

		<!-- Menu -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
			
				<!-- 导航栏 -->
				<li class="dropdown">
					<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">分类<span class="caret"></span></a> -->
					<ul class="dropdown-menu">
						<li><a href="category.html">文章</a></li>
						<li><a href="category.html">图片</a></li>
						<li><a href="category.html">我的</a></li>
						<li><a href="category.html">睡的</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="all-categories.html">查看全部</a></li>
					</ul>
				</li>
				@foreach($category as $k => $v)
				<!-- Other options -->
				<li><a href="/cate/{{$v['id']}}">@if($v['pid'] == 0){{ $v['name']}} @endif</a></li>
				@endforeach
				<!-- <li><a href="#">博主简介</a></li> -->
				<!-- <li><a href="faq.html">常见问题</a></li> -->
				
			</ul>

		</div>
	</div>
</nav>
<!-- Principal image with search -->
<div class="full-header">
	<div class="overlay"></div>
	<div class="search">
		<form action="search.html">
			<input type="text" placeholder="..." class="principal-search">
			<button type="submit" class="principal-search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
		</form>
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
								图片介绍
							</div>
						</div>

						<!-- 轮播图内容 -->
						<div class="item">
							<img src="/h/images/slider/5.jpg" alt="Image 2">
							<div class="carousel-caption">
								图片介绍
							</div>
						</div>

						<!-- 轮播图内容 -->
						<div class="item">
							<img src="/h/images/slider/6.jpg" alt="Image 3">
							<div class="carousel-caption">
								图片介绍
							</div>
						</div>
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

		<!-- 展示页面 -->
		<div class="row">
			<div class="col-sm-12">
				<h4 class="title">最近的图片展示</h4>
				<div class="line-dec"></div>

				<!-- 图片框架 -->
				<div id="recent-photos">

					

					<!-- 图片展示 -->
					<div class="item" id="photo_8">
						<!-- Price ribbon -->
						<div class="ribbon"><span>19$</span></div>
					</div>

				</div>
			</div>
		</div>
		

		<!-- 分类 -->
		<div class="">
			<div class="col-sm-12">
				
				<div class="line-dec"></div>
			</div>
		</div>
				
				<!-- 第一横排4张图片 -->
				

					<div class="col-sm-3">
						<div class="category-block" >
							
								
						</div>
					</div>	
			
				
		
	

	</div>
</div>
@endsection