<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Title -->
<title></title>

<!-- Favicon -->
<link rel="icon" href="/h/favicon.ico" type="image/x-icon" />

<!-- Include CSS -->
<link rel="stylesheet" type="text/css" href="/h/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/h/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/h/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/h/owl-carousel/owl.theme.css">
<link rel="stylesheet" type="text/css" href="/h/owl-carousel/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="/h/css/style.css">

<!--<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,400i,700,800" rel="stylesheet">--->

</head>

<body>

 


<!-- Loader -->
<div id="loader" class="loader">
	<div class="loader-content">
		<img src="/h/images/loader.png" alt="Loading...">
	</div>
</div>

<!-- Header container -->
<div class="header-bg">
	<!-- Container -->
	<div class="container">

		<div class="row flex">
			<!-- Logo column -->
			<div class="col-xs-12 col-sm-5 col-md-4 flex">
				<a href="index.html">
					<!-- Logo -->
					<img src="/h/images/logos.png" class="logo img-responsive" alt="PhotoMarket">
				</a>
			</div>

			<!-- Menu column -->
			<div class="col-xs-12 col-sm-7 col-md-8 flex flex-center">
				<!-- Menu -->
				<ul class="nav nav-pills">
					<li role="presentation"><a href="#">登出</a></li>
					<li role="presentation"><a href="account.html">个人中心</a></li>
					<li role="presentation"><a href="login.html"><b>欢迎</b> <span>登陆</span></a></li>
				</ul>

			</div>
		</div>
	</div>
</div>

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
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">分类<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="category.html">文章</a></li>
						<li><a href="category.html">图片</a></li>
						<li><a href="category.html">我的</a></li>
						<li><a href="category.html">睡的</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="all-categories.html">查看全部</a></li>
					</ul>
				</li>

				<!-- Other options -->
				<li><a href="#">最火的内容</a></li>
				<li><a href="#">博主简介</a></li>
				<li><a href="faq.html">常见问题</a></li>
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
				<h4 class="title">热门类别</h4>
				<div class="line-dec">分类</div>

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
							<img src="/h/images/slider/1.jpeg.jpg" alt="Image 1">
							<div class="carousel-caption">
								图片介绍
							</div>
						</div>

						<!-- 轮播图内容 -->
						<div class="item">
							<img src="/h/images/slider/2.jpg" alt="Image 2">
							<div class="carousel-caption">
								图片介绍
							</div>
						</div>

						<!-- 轮播图内容 -->
						<div class="item">
							<img src="/h/images/slider/3.jpg" alt="Image 3">
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
						<h3>你好，明天</h3>
						<p class="sm-hide">
							啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊
						</p>
						<p>
							<a href="#" class="btn btn-primary" role="button">更多阅读</a>
						</p>
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
		<div class="row">
			<div class="col-sm-12" id="#categories">
				<h4 class="title">我们的分类 <small>水水水水</small></h4>
				<div class="line-dec"></div>
			</div>
		</div>
		<!-- 第一横排4张图片 -->
		<div class="row">

			<div class="col-sm-3">
				<div class="category-block" id="architecture">
					<a href="category.html">
						<span>111111111</span>
					</a>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="category-block" id="food">
					<a href="category.html">
						<span>22222222</span>
					</a>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="category-block" id="cars">
					<a href="category.html">
						<span>33333333</span>
					</a>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="category-block" id="landscapes">
					<a href="category.html">
						<span>44444444</span>
					</a>
				</div>
			</div>

		</div>
		<!-- 第二横排2张图片展示  -->
		<div class="row">
			
			<div class="col-sm-6">
				<div class="category-block" id="people">
					<a href="category.html">
						<span>People</span>
					</a>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="category-block" id="music">
					<a href="category.html">
						<span>Music</span>
					</a>
				</div>
			</div>

		</div>
		<!-- 第三横排3张图片展示  -->
		<div class="row">

			<div class="col-sm-6">
				<div class="category-block" id="technology">
					<a href="category.html">
						<span>Technology</span>
					</a>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="category-block" id="houses">
					<a href="category.html">
						<span>Houses</span>
					</a>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="category-block" id="pets">
					<a href="category.html">
						<span>Pets</span>
					</a>
				</div>
			</div>

		</div>
		<!-- 第四横排3张图片展示  -->
		<div class="row">

			<div class="col-sm-3">
				<div class="category-block" id="animals">
					<a href="category.html">
						<span>Animals</span>
					</a>
				</div>
			</div>

			<div class="col-sm-3">
				<div class="category-block" id="random">
					<a href="category.html">
						<span>Random</span>
					</a>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="category-block" id="others">
					<a href="category.html">
						<span>Others</span>
					</a>
				</div>
			</div>

		</div>

	</div>
</div>

<!-- 尾部信息 -->
<div class="container">
	<div id="footer">
		<div class="row">
			<!-- Information column -->
			<div class="col-sm-4">
				<h4 class="footer-title">Information</h4>
				<div class="line-dec"></div>
				<ul>
					<li><a href="javascript:void(0)" data-toggle="modal" data-target="#legalModal">Legal advice</a></li>
					<li><a href="javascript:void(0)" data-toggle="modal" data-target="#termsModal">Terms and conditions</a></li>
					<li><a href="about-us.html">About us</a></li>
				</ul>
			</div>

			<!-- Offers column -->
			<div class="col-sm-4">
				<h4 class="footer-title">Our offers</h4>
				<div class="line-dec"></div>
				<ul>
					<li><a href="#">New photos</a></li>
					<li><a href="#">Top sellers</a></li>
					<li><a href="#">Discount photos</a></li>
				</ul>
			</div>

			<!-- Account column -->
			<div class="col-sm-4">
				<h4 class="footer-title">Your account</h4>
				<div class="line-dec"></div>
				<ul>
					<li><a href="account.html">Your profile</a></li>
					<li><a href="#">Personal information</a></li>
					<li><a href="#">Shopping history</a></li>
				</ul>
			</div>

			<!-- Copyright -->
			<p>Copyright &copy; 2017.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></p>
		</div>
	</div>
</div>

<!-- Modal Legal advice -->
<div class="modal fade" id="legalModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h4 class="title">Legal advice</h4>
				<div class="line-dec"></div>
				<p class="text-justify">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

					<br><br>

					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
	</div>
</div>

<!-- Modal Terms and conditions -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h4 class="title">Terms and conditions</h4>
				<div class="line-dec"></div>
				<p class="text-justify">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

					<br><br>

					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
	</div>
</div>

<!-- Include Scripts -->
<script type="text/javascript" src="/h/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="/h/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/h/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/h/js/main.js"></script>

</body>
</html>