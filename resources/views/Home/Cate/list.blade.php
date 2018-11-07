@extends('Home.clone_index.clone')
@section('content')
	

			

	
		<!-- Page container -->
		<div class="inner-content" >
			<div class="container">

				<!-- Breadcrumb -->
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
							
							<li class="active">
								分类
							</li>
						</ol>
					</div>
				</div>

				<!-- List & sidebar -->
				<div class="row">

					<!-- List -->
					<div class="col-sm-8 col-md-9" >

						<!-- Category Name -->
						<h4 class="title">
							{{ $cates[0]['name']}}
						</h4>
						<div class="line-dec"></div>
						<hr>
						@foreach($cate as $k => $v)
						<div class="media photo-list" >	
							<!-- photo item body -->
							<div class="media-body">
								<div class="row">
									<!-- Description column -->
									<div class="col-sm-8">
										<h4 class="media-heading photo-list-title">
											{{ $v['name']}}
										</h4>
									</div>
									<!-- Price and actions -->
									<div class="col-sm-4">
										<a href="" class="btn btn-info">发帖</a>
									</div>
								</div>
							</div>
						</div>
							@endforeach
						<!-- Pagination -->
						<nav class="text-center">
							<ul class="pagination">
								<li class="active">
								 {!! $cate->render() !!}
								<li>
								</li>
							</ul>
						</nav>

					</div>

					<!-- Sidebar -->
					<div class="col-sm-4 col-md-3">

						<div class="sidebar-item">
							<h4 class="title">帖子</h4>
							<span class="">标题</span>
							<span class="">作者</span>
							<hr>
						</div>
					</div>

				</div>

			</div>
		</div>
@endsection
