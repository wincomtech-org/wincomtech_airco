<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>

<!--

Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 2.3.1

Version: 1.3

Author: KeenThemes

Website: http://www.keenthemes.com/preview/?theme=metronic

Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469

-->

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->

<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

    <meta charset="utf-8" />

    <title>环球空调</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta content="" name="description" />

    <meta content="" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->

    <link href="/Application/Admin/View/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="/Application/Admin/View/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

    <link href="/Application/Admin/View/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

    <link href="/Application/Admin/View/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

    <link href="/Application/Admin/View/media/css/style.css" rel="stylesheet" type="text/css"/>

    <link href="/Application/Admin/View/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

    <link href="/Application/Admin/View/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

    <link href="/Application/Admin/View/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL STYLES -->

    <link href="/Application/Admin/View/media/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>

    <link href="/Application/Admin/View/media/css/daterangepicker.css" rel="stylesheet" type="text/css" />

    <link href="/Application/Admin/View/media/css/fullcalendar.css" rel="stylesheet" type="text/css"/>

    <link href="/Application/Admin/View/media/css/jqvmap.css" rel="stylesheet" type="text/css" media="screen"/>

    <link href="/Application/Admin/View/media/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>

    <!-- END PAGE LEVEL STYLES -->

    <link rel="shortcut icon" href="/Application/Admin/View/media/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="page-header-fixed">

<!-- BEGIN HEADER -->

<div class="header navbar navbar-inverse navbar-fixed-top">

    <!-- BEGIN TOP NAVIGATION BAR -->

    <div class="navbar-inner">

        <div class="container-fluid">

            <!-- BEGIN LOGO -->

            <a class="brand" href="/index.php" target="_blank">

                环球后台

            </a>

            <!-- END LOGO -->

            <!-- BEGIN RESPONSIVE MENU TOGGLER -->

            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">

                <img src="/Application/Admin/View/media/image/menu-toggler.png" alt="" />

            </a>

            <!-- END RESPONSIVE MENU TOGGLER -->

            <!-- BEGIN TOP NAVIGATION MENU -->

            <ul class="nav pull-right">

                <!-- BEGIN NOTIFICATION DROPDOWN -->



                <!-- END NOTIFICATION DROPDOWN -->

                <!-- BEGIN INBOX DROPDOWN -->



                <!-- END INBOX DROPDOWN -->

                <!-- BEGIN TODO DROPDOWN -->



                <!-- END TODO DROPDOWN -->

                <!-- BEGIN USER LOGIN DROPDOWN -->

                <li class="dropdown user">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img alt="" src="/<?php echo ((isset($_SESSION['avatar']) && ($_SESSION['avatar'] !== ""))?($_SESSION['avatar']):'/Application/Admin/View/img/3.jpeg'); ?>" width="29" height="29"/>

                        <span class="username"><?php echo ($_SESSION['username']); ?></span>

                        <i class="icon-angle-down"></i>

                    </a>

                    <ul class="dropdown-menu">

                        <!--<li><a href="extra_profile.html"><i class="icon-user"></i> My Profile</a></li>

                        <li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>

                        <li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox(3)</a></li>

                        <li><a href="#"><i class="icon-tasks"></i> My Tasks</a></li>

                        <li class="divider"></li>

                        <li><a href="extra_lock.html"><i class="icon-lock"></i> Lock Screen</a></li>-->

                        <li><a href="<?php echo U('users/loginOut');?>"><i class="icon-key"></i>注销</a></li>

                    </ul>

                </li>

                <!-- END USER LOGIN DROPDOWN -->

            </ul>

            <!-- END TOP NAVIGATION MENU -->

        </div>

    </div>

    <!-- END TOP NAVIGATION BAR -->

</div>

<!-- END HEADER -->

<!-- BEGIN CONTAINER -->

<div class="page-container">

    <!-- BEGIN SIDEBAR -->
    <li class="page-sidebar nav-collapse collapse">
    <script type="text/javascript" src="/Application/Admin/View/js/jquery-1.12.1.min.js"></script>
    <!-- BEGIN SIDEBAR MENU -->
    <style>
        .yc{
            display: none!important;
        }
        .xs{
            display: block;
        }
    </style>

    <ul class="page-sidebar-menu">

        <li>

            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

            <div class="sidebar-toggler hidden-phone"></div>

            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->

        </li>

        <li>

            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->

            <form class="sidebar-search">

                <div class="input-box">

                    <a href="javascript:;" class="remove"></a>

                    <input type="text" placeholder="Search..." />

                    <input type="button" class="submit" value=" " />

                </div>

            </form>

            <!-- END RESPONSIVE QUICK SEARCH FORM -->

        </li>

        <li class="lie" >

            <a href="<?php echo U('index/index');?>">

                <i class="icon-home"></i>

                <span class="title">首页</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>
            <ul class="sub-menu" style="display: none;">

                <li class="son">

                    <a name="index" href="<?php echo U('index/index');?>">首页</a>

                </li>

            </ul>


        </li>

        <li class="lie">

            <a href="javascript:" >

                <i class="icon-user"></i>

                <span class="title">用户管理</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li class="son">

                    <a name="users" href="<?php echo U('users/index');?>">用户管理列表</a>

                </li>

            </ul>

        </li>

        <li class="lie">

            <a href="javascript:">

                <i class="icon-th-large"></i>

                <span class="title">产品中心</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li class="son">

                    <a name="product" href="<?php echo U('product/index');?>">产品列表</a>

                </li>

            </ul>

        </li>

        <li class="lie">

            <a href="javascript:">

                <i class=" icon-wrench"></i>

                <span class="title">服务与支持</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li class="">

                    <a  name="server" href="<?php echo U('server/index');?>">服务与支持列表</a>

                </li>

            </ul>

        </li>
        <li class="lie">

            <a href="javascript:">

                <i class=" icon-camera"></i>

                <span class="title">新闻资讯</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li >

                    <a  name="blogs" href="<?php echo U('blogs/index');?>">新闻资讯列表</a>

                </li>

            </ul>

        </li>
        <li class="lie">

            <a href="javascript:">

                <i class=" icon-thumbs-up"></i>

                <span class="title">关于环球</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li >

                    <a  name="about" href="<?php echo U('about/index');?>">关于环球列表</a>

                </li>
                <li >

                <a  name="journey" href="<?php echo U('journey/index');?>">发展历程列表</a>

                </li>

            </ul>

        </li>
        <li class="lie">

            <a href="javascript:">

                <i class="icon-phone"></i>

                <span class="title">联系我们</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li >

                    <a name="contact" href="<?php echo U('contact/index');?>">联系我们列表</a>

                </li>

            </ul>
        </li>
        <li class="lie">

            <a href="javascript:">

                <i class=" icon-globe"></i>

                <span class="title">站点管理</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li >

                    <a name="web" href="<?php echo U('web/index');?>">站点管理列表</a>

                </li>

                <li >

                    <a name="logo"  href="<?php echo U('logo/index');?>">LOGO</a>

                </li>

                <li >

                    <a  name="banner"  href="<?php echo U('banner/index');?>">BANNER</a>

                </li>
            </ul>
        </li>

        <li class="lie">

            <a href="javascript:">

                <i class=" icon-leaf"></i>

                <span class="title">友情链接管理</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li >

                    <a  name="friendlink"  href="<?php echo U('friendlink/index');?>">友情链接列表</a>

                </li>
            </ul>
        </li>

        <li class="lie">

            <a href="javascript:">

                <i class=" icon-cog"></i>

                <span class="title">设置</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>
            <ul class="sub-menu" style="display: none;">

                <li class="" >

                    <a name="role" href="<?php echo U('role/index');?>">角色列表</a>

                </li>

                <li >

                    <a name="note" href="<?php echo U('note/index');?>">节点列表</a>

                </li>
            </ul>
        </li>

        <li class="lie">

            <a href="javascript:">

                <i class=" icon-th-list"></i>

                <span class="title">分类管理</span>

                <span class="arrow "></span>

                <font class=""></font>

            </a>

            <ul class="sub-menu" style="display: none;">

                <li class="">

                    <a name="categories" href="<?php echo U('categories/index');?>">分类列表</a>

                </li>
            </ul>

        </li>

    </ul>

    <!-- END SIDEBAR MENU -->
</div>

    <script type="text/javascript">
        function in_array(search,array){
            for(var i in array){
                if(array[i]==search){
                    return true;
                }
            }
            return false;
        }
        $('.sub-menu li').each(function(){
            var name = $(this).find('a').attr('name');
            var controller="<?php echo ($controller); ?>";
//                    console.log(controller);
            if(name==controller){
                $(this).parent().parent().addClass("start active open").siblings().removeClass("start active open");
                $(this).parent().parent().children("a").children("font").addClass("selected").siblings().removeClass("selected");
                $(this).parent().parent().children("a").children("span:eq(1)").addClass("open").siblings().removeClass("open");
                $(this).parent().css("display","block");
            }
        });

            $(function(){
                $(".title").each(function(){
                    var title = $(this).text();
                    var pname="<?php echo ($pname); ?>";
                    pname=pname.split(",");
                    console.log(pname);
//                    console.log(title);
//                    alert($.inArray(name,nav));
                    if(!in_array(title,pname)){
//                        alert($(this).text());
                        $(this).parent().parent().removeClass("start active open").addClass("yc");
                    }
                });

                $('.sub-menu li').each(function(){
                    var name = $(this).find('a').attr('name');
                    var nav="<?php echo ($nav); ?>";
                    nav=nav.split(",");
//                    console.log(nav);
//                    console.log(i);
//                    alert($.inArray(name,nav));
                    if(!in_array(name,nav)){
//                        alert($(this).text());
                        $(this).addClass("yc");
                    }
                });

                // nav
                $(".lie a").click(function(){
                    $(this).parent().addClass("start active").siblings().removeClass("start active");
                    $(this).children("font").addClass("selected").siblings().removeClass("selected");
                });


            });


    </script>

<!-- END SIDEBAR -->


    <!-- BEGIN PAGE -->

    <div class="page-content">

        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <div id="portlet-config" class="modal hide">

            <div class="modal-header">

                <button data-dismiss="modal" class="close" type="button"></button>

                <h3>Widget Settings</h3>

            </div>

            <div class="modal-body">

                Widget settings form goes here

            </div>

        </div>

        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <!-- BEGIN PAGE CONTAINER-->

        <div class="container-fluid">

            <!-- BEGIN PAGE HEADER-->

            <div class="row-fluid">

    <div class="span12">

        <!-- BEGIN STYLE CUSTOMIZER -->



        <!-- END BEGIN STYLE CUSTOMIZER -->

        <!-- BEGIN PAGE TITLE & BREADCRU/Application/Admin/View/-->

        <h3 class="page-title fl">

            环球空调 <small>欢迎您</small>

        </h3>

        <ul class="breadcrumb">

            <li>

                <i class="icon-home"></i>

                <a href="<?php echo U('index/index');?>">Home</a>

                <i class="icon-angle-right"></i>

            </li>


            <?php if($Think.CONTROLLER_NAME==Users): ?><li><a href=<?php echo U("users/index");?>>用户列表</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Logo): ?><li><a href=<?php echo U("logo/index");?>>LOGO列表</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Banner): ?><li><a href=<?php echo U("banner/index");?>>BANNER列表</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Blogs): ?><li><a href=<?php echo U("blogs/index");?>>新闻资讯</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Product): ?><li><a href=<?php echo U("product/index");?>>产品中心</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Server): ?><li><a href=<?php echo U("server/index");?>>服务和支持</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==About): ?><li><a href=<?php echo U("about/index");?>>关于环球</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Contact): ?><li><a href=<?php echo U("contact/index");?>>联系我们</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Web): ?><li><a href=<?php echo U("web/index");?>>网站管理列表</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Journey): ?><li><a href=<?php echo U("journey/index");?>>发展历程列表</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Friendlink): ?><li><a href=<?php echo U("friendlink/index");?>>友情链接列表</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Note): ?><li><a href=<?php echo U("note/index");?>>权限列表</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Role): ?><li><a href=<?php echo U("role/index");?>>角色列表</a></li><?php endif; ?>

            <?php if($Think.CONTROLLER_NAME==Categories): ?><li><a href=<?php echo U("categories/index");?>>分类列表</a></li><?php endif; ?>


            <?php if($Think.CONTROLLER_NAME==Index): ?><li>主 页</li><?php endif; ?>
            <li class="pull-right no-text-shadow"></li>

            <?php if($Think.ACTION_NAME==index): endif; ?>

            <?php if($Think.ACTION_NAME==update): ?>&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;

                <li>更新</li><?php endif; ?>

            <?php if($Think.ACTION_NAME==add): ?>&nbsp;&nbsp;<i class="icon-angle-right"></i>&nbsp;&nbsp;

                <li>添加</li><?php endif; ?>

            <li class="pull-right no-text-shadow">

            </li>


        </ul>

        <!-- END PAGE TITLE & BREADCRU/Application/Admin/View/-->

    </div>

</div>
            <!--内容区域-->
            <div id="main">
                <div style="text-align: right"><a class="btn" href="<?php echo U('users/reg');?>">用户注册</a></div>
                <table class="table table-striped table-bordered table-hover mytable">
                    <tr style="height: 50px;"><th>头像</th><th>用户ID</th><th>用户名</th><th>性别</th><th>注册时间</th><th>操作</th></tr>
                    <?php if(is_array($arr)): $i = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><img src="/<?php echo ((isset($vo['avatar']) && ($vo['avatar'] !== ""))?($vo['avatar']):'/Application/Admin/View/img/3.jpeg'); ?>" width="50" height="50"></td>
                            <td><span class="label label-info"><?php echo ($vo['uid']); ?></span></td>
                            <td><span class="label label-success"><?php echo (htmlspecialchars($vo['username'])); ?></span></td>
                            <td><span class="label label-important"><?php echo ($vo['sex']=="m"?男:女); ?></span></td>
                            <td><span class="label label-inverse"><?php echo (date("Y-m-d H:i:s",$vo['regtime'])); ?></span></td>
                            <td><i class="icon-pencil"></i> <a href="<?php echo U('users/update','uid='.$vo['uid']);?>">编辑</a> | <i class="icon-trash"></i> <a href="<?php echo U('users/delete','uid='.$vo['uid']);?>" onclick="return confirm('亲，数据无价，真的忍心删除吗？')" >删除</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <div class="pagination pagination-large">
                    <ul><?php echo ($pageStr); ?></ul>
                </div>
            </div>
        </div>


    </div>

    <!-- END PAGE -->

</div>

<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->

<div class="footer">

    <div class="footer-inner">

        2017 &copy;环球空调后台

    </div>

    <div class="footer-tools">

			<span class="go-top">

			<i class="icon-angle-up"></i>

			</span>

    </div>

</div>

<!-- END FOOTER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<!-- BEGIN CORE PLUGINS -->

<script src="/Application/Admin/View/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

<script src="/Application/Admin/View/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/bootstrap.min.js" type="text/javascript"></script>

<!--[if lt IE 9]>

<script src="/Application/Admin/View/media/js/excanvas.min.js"></script>

<script src="/Application/Admin/View/media/js/respond.min.js"></script>

<![endif]-->

<script src="/Application/Admin/View/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.blockui.min.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.cookie.min.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.uniform.min.js" type="text/javascript" ></script>

<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->

<script src="/Application/Admin/View/media/js/jquery.vmap.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.vmap.russia.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.vmap.world.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.vmap.europe.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.vmap.germany.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.vmap.usa.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.vmap.sampledata.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.flot.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.flot.resize.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.pulsate.min.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/date.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/daterangepicker.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.gritter.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/fullcalendar.min.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.easy-pie-chart.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/jquery.sparkline.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="/Application/Admin/View/media/js/app.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/index.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>

    jQuery(document).ready(function() {

        App.init(); // initlayout and core plugins

        Index.init();

        Index.initJQVMAP(); // init index page's custom scripts

        Index.initCalendar(); // init index page's custom scripts

        Index.initCharts(); // init index page's custom scripts

        Index.initChat();

        Index.initMiniCharts();

        Index.initDashboardDaterange();

        //Index.initIntro();

    });

</script>

<!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>