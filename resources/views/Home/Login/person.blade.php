@extends('Home.clone_index.clone')
@section('content')
		<!-- Page container -->
		<div class="inner-content-home">
			<div class="container">

				<div class="row margin-bottom-20">

					<!-- Profile info -->
					<div class="col-md-3 col-sm-5">
						<div class="img-profile text-center">
							<img src="{{ $all->userperson['pic']}}" class="img-responsive" alt="John Doe" >
							<div class="profile-name">
								John Doe
							</div>
						</div>

						<h4 class="title">个人资料</h4>
						<div class="line-dec"></div>
						<ul class="list-group">
							<li class="list-group-item"><b>昵称:</b> {{ $all['username'] or ''}}</li>
							<li class="list-group-item"><b>生日:</b> {{ $all->userperson['birthday'] or ''}}</li>
							<li class="list-group-item"><b>爱好：</b> 
								<span class="badge">
									@if($all->userperson['like'] == 1) 旅游@endif
									@if($all->userperson['like'] == 2) 美食@endif
									@if($all->userperson['like'] == 3) 看书@endif
								</span></li>
							
							<li class="list-group-item"><b>婚姻状况：</b>
							 <span class="badge">
							 	@if( $all->userperson['hy'] ==1) 单身狗 @endif
							 	@if( $all->userperson['hy'] ==2) 已婚 @endif
							 	@if( $all->userperson['hy'] ==3) 隐藏 @endif

							 </span></li>
							<li class="list-group-item"><b>电子邮箱：:</b>{{ $all['email'] or ''}}</li>
							<li class="list-group-item"><b>个性签名:</b>{{ $all->userperson['qm'] or ''}}</li>
						</ul>

						<a href="/person/create" class="btn btn-block btn-success">修改资料
						</a>

					</div>

					<div class="col-md-6 col-sm-7">
						<h4 class="title">发表的帖子</h4>
						<div class="line-dec"></div>
						@foreach($article as $k => $v)
						<div class="grid">							
						<div class="grid-item">
								<a href="/cate/shows/{{ $v['id']}}">
									<img src="{{ $v['image'] or ''}}" class="img-responsive" alt="">
									<span class="badge">{{ $v['title']}}</span>
									<span class="badge"> 查看详情</span>
								</a>
                                 <button class="badge" onclick="del(this,'{{$v['id']}}')"  id ='{{ $v["id"]}}'>删除</button>	
							</div>
						</div>
						@endforeach
					</div>

					<div class="col-md-3 col-sm-12">
						<h4 class="title">热门博主推荐</h4>
						<div class="line-dec"></div>
						@foreach($hot as $k => $v)
						<!-- photo list item -->
						<div class="media photo-list">
							<a href="/person/bloggercenter/{{ $v['id']}}">
								<img src="/h/images/photos/1.jpg" class="img-responsive margin-bottom-20" alt="Last sale photo 1">
								<div class="media-body">
								<div class="row">
									<!-- Description column -->
									<div class="col-sm-8">
										<h4 class="media-heading photo-list-title">
											博主：{{ $v['username']}}
										</h4>
									</div>
								</div>
							</div>
							
							</a>
							
						</div>
						@endforeach
					</div>

				</div>

			</div>
		</div>

	<script type="text/javascript">
		
	//一般直接写在一个js文件中
		  var layer = layui.layer,form = layui.form;
	$("img").error(function(){
　　//当图片加载失败时，你要进行的操作
	$(this).attr('src','/h/images/2.jpg');
});
	 function del(obj,id)
            {
               $.ajax({
                    url : '/person/delete',
                    type : 'get',
                    data : {'id' : id},
                    success : function(msg){
                        if (msg == 'success') {
                           
                            $(obj).parent().parent().remove();
                            alert('删除成功');                    
                        }else{
                            alert('删除失败');
                        }
                    },
                    dataType : 'html',
                    async: false

               });
              }
	</script>
@endsection