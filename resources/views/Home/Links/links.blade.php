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
							添加友情链接
						</h4>
						<div class="line-dec"></div>

						<form action="/links" method="post" enctype="multipart/form-data" class="banner-upload">
							<input type="hidden" name="_token" value="od9fipObiHlyyc9DvGVzpHC5c99SLXtiwAFeGrL2">
							<div class="form-group">
								<label for="name">网站名称</label>
								<input type="text" class="form-control" id="name" name="wzname" placeholder="">
								<span id="name"></span>
							</div>
							<div class="form-group">
								<label for="lastname">网站地址</label>
								<input type="text" class="form-control" id="lastname" name="wzurl" placeholder="">
								<span id="url"></span>
							</div>
							<div class="form-group">
								<label for="lastname">网站连接</label>
								<input type="radio"  id="lastname" value="0" name="status">申请链接
								<span id="sta"></span>
							</div>
							<div class="form-group">
								<label for="lastname">网站LOGo</label>
								<input type="file" class="small" id="lastname" name="pic">
								<span id="repw"></span>
							</div>
							{{csrf_field()}}
							<input type="submit" name="注册" class="btn btn-info">
						</form>
					</div>
							<!-- 提示框 -->
							<div class="col-sm-6" style="width:200px">

							</div>
							<div class="col-sm-4 col-md-3">
								<div class="col-sm-4">
									<h4 class="title"></h4>
									<div class="line-dec"></div>

									<!-- 提示内容 -->
									<div class="thumbnail" style="width:300px">
										<img src="/h/images/3.jpg" alt="Tip of the day">
										<div class="caption">
											<h3>尊敬的用户，您好：</h3>
											<p class="sm-hide">
												欢迎您入驻初音的小博客，祝您有个愉快的体验
											</p>
											
										</div>
									</div>
							</div>
						</div>
						<!-- 提示框结束 -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- JQUERY代码判断 -->
		<script type="text/javascript">
			$("input[name=wzname]").focus(function(){
				$('span[id=name]').html("<span style='color:red'>请输入网站的名称</span>");
			}).blur(function(){
				$('span[id=name]').html("<span> </span>");
			})
			$("input[name=wzurl]").focus(function(){
				$('span[id=url]').html("<span style='color:red'>请输入正确的网站地址</span>");
			}).blur(function(){
				$('span[id=url]').html("<span> </span>");
			})
		</script>
@endsection 