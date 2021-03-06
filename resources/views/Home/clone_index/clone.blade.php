<?php 
 //网站配置 
use App\Model\Config;
// 用户
use App\Model\User;
$config =Config::all();
$user =User::where('username',session('username'))->first();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@foreach($config as $k => $v)
<!-- Title -->
<title>{{$v['title']}}</title>

<!-- Favicon -->
<link rel="icon" href="/h/favicon.ico" type="image/x-icon" />

<!-- Include CSS -->
<link rel="stylesheet" type="text/css" href="/h/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/h/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/h/owl-carousel/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/h/owl-carousel/owl.theme.css">
<link rel="stylesheet" type="text/css" href="/h/owl-carousel/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="/h/css/style.css">
<link rel="stylesheet" type="text/css" href="/h/css/Leaving.css">
<script type="text/javascript" src="/a/bootstrap/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" href="/h/layer-v3.1.1/layer/mobile/need/layer.css">
<link rel="stylesheet" href="/h/layui-v2.4.5/layui/css/layui.css">
<script src="/h/layui-v2.4.5/layui/layui.all.js"></script>
<script src="/h/layer-v3.1.1/layer/layer.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

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
				<a href="/home">
					<!-- Logo -->
					<img src="{{ $v['logo']}}" class="logo img-responsive" alt="PhotoMarket" style="width:327px ;height:90px">
				</a>
			</div>

			<!-- Menu column -->
			<div class="col-xs-12 col-sm-7 col-md-8 flex flex-center">
				<!-- Menu -->
				<ul class="nav nav-pills">
					<li role="presentation"><a href="/del">退出</a></li>
					@if(session('username'))
					<li role="presentation"><a href="/person">个人中心</a></li>
					<li role="presentation"><a href=""><b>用户名：</b> <span>{{session('username')}}</span></a></li>
					@else
					<li role="presentation"><a href="/loginuser/create"><b></b> <span>登录</span></a></li>
					<li role="presentation"><a href="/login/create"><b>欢迎</b> <span>注册</span></a></li>
					@endif
				</ul>

			</div>
		</div>
	</div>
</div>


  <!-- 读取错误信息 -->
	 @if(session('success'))
	    <div class=''>
	        {{ session('success')}}
	    </div>
	 @endif
	 <!-- 错误提示 -->
	  
	  @if(session('error'))
	    <div class=''>
	        {{ session('error')}}
	    </div>
	 @endif
@section('content') 

@show
<!-- 尾部信息 -->
<div class="container">
	<div id="footer">
		<div class="row">
			<!-- Copyright -->
			<p> {{ $v['copyright']}}</p>
		</div>
	</div>
</div>
@endforeach
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