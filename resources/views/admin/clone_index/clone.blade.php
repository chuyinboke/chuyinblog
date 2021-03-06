<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/a/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/a/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/a/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/a/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/a/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/a/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/a/css/page_page.css">
<script type="text/javascript" src="/a/bootstrap/js/jquery-1.8.3.min.js"></script>
<emeta name='csrf-token' content='{{ csrf_token() }}'>

<title>初音家博客后台</title>

</head>

<body>

    <!-- Themer (Remove if not needed) -->  
    <div id="mws-themer">
        <div id="mws-themer-content">
            <div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
            <div id="mws-theme-presets-container" class="mws-themer-section">
                <label for="mws-theme-presets">Color Presets</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div id="mws-theme-pattern-container" class="mws-themer-section">
                <label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
        <div id="mws-themer-css-dialog">
            <form class="mws-form">
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo  -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <a href="/home"><img src="/a/images/mws-logo.png" alt="mws admin"></a>
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
            <!-- Notifications -->
            <div id="mws-user-notif" class="mws-dropdown-menu">
               
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                            <li class="read">
                                <a href="/a/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="read">
                                <a href="/a/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="/a/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="/a/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="/a/#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
              
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                    <div class="mws-dropdown-content">
                        <ul class="mws-messages">
                            <li class="read">
                                <a href="/a/#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="read">
                                <a href="/a/#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="/a/#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                            <li class="unread">
                                <a href="/a/#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
                            <a href="/a/#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="/a/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        管理员 ：{{ session('admin')}}
                    </div>
                    <ul>
                        <li><a href="/home">首页</a></li>
                        <li><a href="/deladmin">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- 目录栏 -->
            <div id="mws-navigation">
            <!-- 用户管理 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-users"></i>用户管理</a>
                        <ul>
                            <li><a href="/admin/user/create">添加用户</a></li>
                            <li><a href="/admin/user">用户列表</a></li>
                        </ul>
                    </li>
                </ul>
                
            <!-- 分类管理 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-align-left"></i>分类管理</a>
                        <ul>
                            <li><a href="/admin/cate/create">添加分类</a></li>
                            <li><a href="/admin/cate">分类列表</a></li>
                        </ul>
                    </li>
                </ul>

            <!-- 文章管理 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-list"></i>文章管理</a>
                        <ul>
                            <li><a href="/admin/article/create">添加文章</a></li>
                            <li><a href="/admin/article">文章列表</a></li>
                        </ul>
                    </li>
                </ul> 

            <!-- 公告管理 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-newspaper"></i>公告管理</a>
                        <ul>
                            <li><a href="/admin/notice/create">添加公告</a></li>
                            <li><a href="/admin/notice">公告列表</a></li>
                        </ul>
                    </li>
                </ul> 

           <!-- 友情链接 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-firefox"></i>友情链接</a>
                        <ul>
                            <li><a href="/admin/links/create">添加链接</a></li>
                            <li><a href="/admin/links">链接列表</a></li>
                            <li><a href="/admin/homelinks">链接申请</a></li>
                        </ul>
                    </li>
                </ul>

            <!-- 轮播图管理 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-newspaper"></i>轮播图管理</a>
                        <ul>
                            <li><a href="/admin/rotation/create">添加轮播图</a></li>
                            <li><a href="/admin/rotation">轮播图列表</a></li>
                        </ul>
                    </li>
                </ul>
            <!-- 相册管理 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-newspaper"></i>图片管理</a>
                        <ul>
                            <li><a href="/admin/album/create">添加图片</a></li>
                            <li><a href="/admin/album">图片列表</a></li>
                        </ul>
                    </li>
                </ul>
            <!-- 评论管理 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-newspaper"></i>评论管理</a>
                        <ul>
                            <li><a href="/admin/comment">文章评论列表</a></li>
                        </ul>
                    </li>
                </ul>
            <!-- 留言板 -->
                 <ul>
                    <li>
                        <a href="/a/#"><i class="icon-newspaper"></i>留言板管理</a>
                        <ul>
                            <li><a href="/admin/Leaving">留言板列表</a></li>
                        </ul>
                    </li>
                </ul>
            <!-- 回收站 -->
                <ul>
                    <li>
                        <a href="/a/#"><i class="icon-newspaper"></i>回收站</a>
                        <ul>
                            <li><a href="/recycle">用户回收列表</a></li>
                            <li><a href="/recyclewz">文章回收列表</a></li>
                        </ul>
                    </li>
                </ul>
            <!-- 关于博主 -->
                   <ul>
                    <li>
                        <a href="/a/#"><i class="icon-newspaper"></i>关于博主</a>
                        <ul>
                            <li><a href="/admin/Blogger/create ">添加博主介绍</a></li>
                            <li><a href="/admin/Blogger">后台博主简介</a></li>
                        </ul>
                    </li>
                </ul>
            <!-- 网站配置 -->
                  <ul>
                    <li>
                        <a href="/a/#"><i class="icon-newspaper"></i>网站配置</a>
                        <ul>
                            <li><a href="/config/create">网站配置</a></li>
                        </ul>
                    </li>
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
          
            <!-- Inner Container Start -->
            <div class="container">
                 <!-- 读取错误信息 -->
                 @if(session('success'))
                    <div class='mws-form-message success'>
                        {{ session('success')}}
                    </div>
                 @endif
                 <!-- 错误提示 -->
                  
                 @if(session('error'))
                    <div class='mws-form-message success'>
                        {{ session('error')}}
                    </div>
                 @endif

                 @section('content')
               
                @show
               
              
                <!-- 帖子页面 -->
                <div class="mws-panel grid_8 mws-collapsible">
                   
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
               
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/a/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/a/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/a/js/libs/jquery.placeholder.min.js"></script>
    <script src="/a/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/a/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/a/jui/jquery-ui.custom.min.js"></script>
    <script src="/a/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/a/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/a/js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/a/plugins/flot/jquery.flot.min.js"></script>
    <script src="/a/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/a/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/a/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/a/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/a/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/a/plugins/validate/jquery.validate-min.js"></script>
    <script src="/a/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/a/bootstrap/js/bootstrap.min.js"></script>
    <script src="/a/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/a/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/a/js/demo/demo.dashboard.js"></script>

</body>
</html>