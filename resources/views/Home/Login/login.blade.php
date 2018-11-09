@extends('Home.clone_index.clone')
@section('content')
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
		<!-- Shopping cart -->
		<div class="container absolute cart-container">
			<div class="shopping-cart">
			
				<!-- Shopping cart items -->
				<ul class="shopping-cart-items">
					<!-- Shopping cart item -->
					<li class="clearfix">
						<!-- Item photo -->
						<img src="images/cart-images/1.jpg" width="70" alt="item1" />
						<!-- Item Name -->
						<span class="item-name">Rails</span>
						<!-- Item Price -->
						<span class="item-price">$19.99</span>
						<!-- Item Quantity -->
						<span class="item-quantity">Quantity: 01</span>
					</li>
					<!-- Shopping cart item -->
					<li class="clearfix">
						<!-- Item photo -->
						<img src="images/cart-images/2.jpg" width="70" alt="item2" />
						<!-- Item Name -->
						<span class="item-name">Forest leaves</span>
						<!-- Item Price -->
						<span class="item-price">$9.99</span>
						<!-- Item Quantity -->
						<span class="item-quantity">Quantity: 01</span>
					</li>
					<!-- Shopping cart item -->
					<li class="clearfix">
						<!-- Item photo -->
						<img src="images/cart-images/3.jpeg.jpg" width="70" alt="item3" />
						<!-- Item Name -->
						<span class="item-name">The tiger</span>
						<!-- Item Price -->
						<span class="item-price">$5.00</span>
						<!-- Item Quantity -->
						<span class="item-quantity">Quantity: 01</span>
					</li>
					<!-- Shopping cart item -->
					<li class="clearfix">
						<!-- Item photo -->
						<img src="images/cart-images/4.jpeg.jpg" width="70" alt="item4" />
						<!-- Item Name -->
						<span class="item-name">Flowers</span>
						<!-- Item Price -->
						<span class="item-price">FREE</span>
						<!-- Item Quantity -->
						<span class="item-quantity">Quantity: 01</span>
					</li>
				</ul>
				<!-- Checkout button -->
				<a href="checkout.html" class="button">Checkout</a>
			</div>
		</div>

	</div>
</div>

<!-- Page container -->
<div class="inner-content">
	<div class="container">

		<!-- Breadcrumb -->
		<div class="row">
			<div class="col-sm-12">
				<ol class="breadcrumb">

				</ol>
			</div>
		</div>

		<!-- Content & sidebar -->
		<div class="row">

			<!-- content -->
			<div class="col-sm-8 col-md-9">

				<div class="row">
					<div class="col-sm-6">
						<h4 class="title">
							注册新账户
						</h4>
						<div class="line-dec"></div>

						<form action='/login' method='post'>
							{{ csrf_field()}}
							<div class="form-group">
								<label for="name">昵称</label>
								<input type="text" class="form-control" id="name" name='username' placeholder="请输入名称">
								<span id="name"></span>
							</div>
							<div class="form-group">
								<label for="lastname">密码</label>
								<input type="password" class="form-control" id="lastname" name='password' placeholder="请输入密码">
								<span id='pw'></span>
							</div>
							<div class="form-group">
								<label for="lastname">确认密码</label>
								<input type="password" class="form-control" id="lastname" name='repassword' placeholder="确认密码">
								<span id='repw'></span>
							</div>
							<div class="form-group">
								<label for="lastname">手机号</label>
								<input type="text" class="form-control" id="lastname" name='phone' placeholder="请输入手机号">
								<span id='phone'></span>
							</div>
							<div class="form-group">
								<label for="email">邮箱</label>
								<input type="text" class="form-control" id="email" name='email' placeholder="请输入邮箱">
								<span id='email'></span>
							</div>
							
							
							<input type="submit" name="注册">
						</form>
					</div>

						<div class="col-sm-6" style="width:200px">

						</div>
						<div class="col-sm-4 col-md-3" >
							<div class="col-sm-4" >
								<h4 class="title"></h4>
								<div class="line-dec"></div>

								<!-- 提示内容 -->
								<div class="thumbnail"style="width:300px">
									<img src="/h/images/1.jpeg" alt="Tip of the day">
									<div class="caption">
										<h3>尊敬的用户，您好：</h3>
										<p class="sm-hide">
											欢迎您入驻初音的小博客，祝您有个愉快的体验
										</p>
										
									</div>
						</div>
					</div>
						
					</div>
				</div>

			</div>

		</div>

	</div>
</div>	
<script type="text/javascript">
	//用户提示信息
	$('input[name=username]').focus(function(){
		$('span[id=name]').html("<span style='color:red'>请输入字母，下划线，数字6-18位</span>");
	}).blur(function(){
		$('span[id=name]').html("");
	});
	// 密码提示信息
	$('input[name=password]').focus(function(){
		$('span[id=pw]').html("<span style='color:red'>请输入密码6-18位</span>");
	}).blur(function(){
		$('span[id=pw]').html("");
	});
	// 再次确认密码
	$('input[name=repassword]').focus(function(){
		$('span[id=repw]').html("<span style='color:red'>请确认密码</span>");
	}).blur(function(){
		$('span[id=repw]').html("");
	});
	// 手机号
	$('input[name=phone]').focus(function(){
		$('span[id=phone]').html("<span style='color:red'>请输入手机号，格式11位</span>");
	}).blur(function(){
		$('span[id=phone]').html("");
	});
	// 邮箱
	$('input[name=email]').focus(function(){
		$('span[id=email]').html("<span style='color:red'>请输入邮箱，格式：112233@qq.com</span>");
	}).blur(function(){
		$('span[id=email]').html("");
	});
</script>
@endsection