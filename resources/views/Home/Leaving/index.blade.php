@extends('Home.clone_index.clone')
@section('content')
<!--留言板-->
<div class="message">
    <div class="block-ph"></div>
    <div class="block">
        <div class="block-title">向博主提问</div>
        <div class="block-intro">欢迎提问,欢迎留言,我将以每日公告的方式回复</div>
        <div class="block-con">
            <div class="con-title">
                <p>问题</p>
                <p>你还可以输入<span id="surplus">500</span>字</p>
            </div>
            <div class="con-input">
                <form action="/Leaving" method="post">
                    {{ csrf_field()}}
                    <textarea name="message" id="input-mess" cols="75" rows="9">
                        
                    </textarea>
                    <br/>
                    <input type="submit" id="sub" value="提交">
                </form>
            </div>
        </div>
    </div>
    <div class="comment-box"></div>
</div>
<!--页脚-->
@endsection