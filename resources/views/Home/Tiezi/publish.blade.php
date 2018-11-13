@extends('Home.clone_index.clone')
@section('content')
<!-- 显示验证错误信息 -->
	@if (count($errors) > 0)
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
				<div class="row">
					<div class="col-sm-12">
						<h4 class="title">
							发表帖子
						</h4>
						<div class="line-dec"></div>
						<p class="description"><small>请文明发帖</small></p>
						<hr>
						<div class="row" >
							<div class="col-sm-6">
								<form action='/publish/{{$id}}' method='post' style="margin:0px auto"  enctype="multipart/form-data">
										{{ csrf_field()}}
										{{ method_field('PUT') }}
										 <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="inputEmail3" name='title' placeholder="" style ="width:600px" >
										    </div>
										  </div>
										
										 <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">图片</label>
										    <div class="col-sm-10">
										      <input type="file" class="form-control" id="inputEmail3" name='pic' placeholder="" style ="width:600px" >
										    </div>
										  </div>
										    <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">来源</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="inputEmail3" name='source' placeholder="" style ="width:600px" >
										    </div>
										  </div>
										  <br>
										   <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">内容</label>
										    <div class="col-sm-10">
										    	  <!--       加载编辑器的容器 -->
												    <script id="container" name="content" type="text/plain" name='content' style ="width:600px" > 
												    
												    </script> 
										    </div>
										  </div>
										 
										  <input type="submit"  class="btn btn-primary" value='发表'>
									</form>
							
							</div>
					
						</div>

						<!-- separator -->
						<hr>

						<!-- Similar photos row -->
						<div class="row">
							<div class="col-sm-12">
								<h4 class="title">Similar photos in stock</h4>
								<div class="line-dec"></div>

								<!-- Recent photos carousel -->
								<div id="recent-photos">

									<!-- Recent photo (item) -->
									<div class="item" id="photo_1">
										<!-- Price ribbon -->
										<div class="ribbon"><span>19$</span></div>
									</div>

									<!-- Recent photo (item) -->
									<div class="item" id="photo_2">
										<!-- Price ribbon -->
										<div class="ribbon"><span>5$</span></div>
									</div>

									<!-- Recent photo (item) -->
									<div class="item" id="photo_3">
										<!-- Price ribbon -->
										<div class="ribbon"><span>9$</span></div>
									</div>

									<!-- Recent photo (item) -->
									<div class="item" id="photo_4">
										<!-- Price ribbon -->
										<div class="ribbon"><span>10$</span></div>
									</div>

									<!-- Recent photo (item) -->
									<div class="item" id="photo_5">
										<div class="ribbon"><span>FREE</span></div>
									</div>

									<!-- Recent photo (item) -->
									<div class="item" id="photo_6">
										<!-- Price ribbon -->
										<div class="ribbon"><span>15$</span></div>
									</div>

									<!-- Recent photo (item) -->
									<div class="item" id="photo_7">
										<!-- Price ribbon -->
										<div class="ribbon"><span>FREE</span></div>
									</div>

									<!-- Recent photo (item) -->
									<div class="item" id="photo_8">
										<!-- Price ribbon -->
										<div class="ribbon"><span>19$</span></div>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
<!-- 配置文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
 var ue = UE.getEditor('container'); 
 </script> 
@endsection