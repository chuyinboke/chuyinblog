@extends('Home.clone_index.clone')
@section('content')
		<!-- Page container -->
		<div class="inner-content-home">
			<div class="container">

				<div class="row margin-bottom-20">

					<!-- Profile info -->
					<div class="col-md-3 col-sm-5">
						<div class="img-profile text-center">
							<img src="/h/images/2.jpg" class="img-responsive" alt="John Doe">
							<div class="profile-name">
								John Doe
							</div>
						</div>

						<h4 class="title">个人资料</h4>
						<div class="line-dec"></div>

						<ul class="list-group">
							<li class="list-group-item"><b>昵称:</b> {{ $all['username'] or ''}}</li>
							<li class="list-group-item"><b>生日:</b> {{ $person['birthday'] or ''}}</li>
							<li class="list-group-item"><b>爱好：</b> <span class="badge">{{ $person['like'] or ''}}</span></li>
							
							<li class="list-group-item"><b>婚姻状况：</b> <span class="badge">{{ $person['hy'] or ''}}</span></li>
							<li class="list-group-item"><b>电子邮箱：:</b>{{ $all['email'] or ''}}</li>
							<li class="list-group-item"><b>个性签名:</b>{{ $person['qm'] or ''}}</li>
						</ul>

						<a href="/person/create" class="btn btn-block btn-success">修改资料
						</a>
					</div>

					<div class="col-md-6 col-sm-7">
						<h4 class="title">Your photos</h4>
						<div class="line-dec"></div>

						<div class="grid">

							<div class="grid-sizer"></div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/3.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/1.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/2.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/4.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/1.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/4.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/3.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/2.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/3.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/1.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/2.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/4.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/1.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/4.jpeg.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

							<div class="grid-item">
								<a href="picture.html">
									<img src="/h/images/your-photos/3.jpg" class="img-responsive" alt="your-photo">
								</a>
							</div>

						</div>
					</div>

					<div class="col-md-3 col-sm-12">
						<h4 class="title">Lasts sales</h4>
						<div class="line-dec"></div>

						<!-- photo list item -->
						<div class="media photo-list">
							<a href="#">
								<img src="/h/images/photos/1.jpg" class="img-responsive margin-bottom-20" alt="Last sale photo 1">
							</a>
							<div class="media-body">
								<div class="row">
									<!-- Description column -->
									<div class="col-sm-8">
										<h4 class="media-heading photo-list-title">
											Aliquam erat velit
										</h4>
									</div>
									<!-- Price and actions -->
									<div class="col-sm-4">
										<h4 class="media-heading photo-list-price">
											4.99$ <small>usd</small>
										</h4>
									</div>
								</div>
							</div>
						</div>

						<!-- photo list item -->
						<div class="media photo-list">
							<a href="#">
								<img src="/h/images/photos/1.jpg" class="img-responsive margin-bottom-20" alt="Last sale photo 2">
							</a>
							<div class="media-body">
								<div class="row">
									<!-- Description column -->
									<div class="col-sm-8">
										<h4 class="media-heading photo-list-title">
											Aliquam erat velit
										</h4>
									</div>
									<!-- Price and actions -->
									<div class="col-sm-4">
										<h4 class="media-heading photo-list-price">
											4.99$ <small>usd</small>
										</h4>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>

			</div>
		</div>

	
@endsection