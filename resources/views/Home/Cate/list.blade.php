@extends('Home.clone_index.clone')
@section('content')
	<!-- 分类的列表页 -->
		<!-- Page container -->
		<div class="inner-content" >
			<div class="container">

				<!-- Breadcrumb -->
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
							<li class="title">
								{{ $cates[0]['name']}}
							</li>
						</ol>
					</div>
				</div>
				<!-- List & sidebar -->
				<div class="row">
					@foreach($article as $k=>$v)
					<!-- List -->
					<div class="col-sm-8 col-md-9" >

						<!-- Category Name -->
						<h4 class="title">
							
						</h4>
						<div class="line-dec"></div>
						<hr>

						<div class="media photo-list">
							<!-- 文章图片显示 -->
							<div class="media-left">
								<a href="#">
									<img class="media-object photo-list-image" alt="快来添加我" src="{{ $v['pic']}}">
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
					</div>
					@endforeach
						<div class="sidebar-item">
							<a href="/publish/{{ $cates[0]['id']}}/edit"><h4 class="media-heading photo-list-title">发表帖子</h4></a>
						</div>
				</div>
						<nav class="text-center">
							<ul class="pagination">
								<li class="active">{!! $article->render() !!}<li>
							</ul>
						</nav>
			</div>
		</div>
@endsection
