<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

    <meta charset="utf-8" />

    <title>环球空调后台</title>

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

    <link href="/Application/Admin/View/media/css/login.css" rel="stylesheet" type="text/css"/>

    <!-- END PAGE LEVEL STYLES -->

    <link rel="shortcut icon" href="/Application/Admin/View/media/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login">

<!-- BEGIN LOGO -->

<div class="logo">

    <font style="color: #ffffff; font-size: 20px;">环球空调</font>

</div>

<!-- END LOGO -->

<!-- BEGIN LOGIN -->

<div class="content">

    <!-- BEGIN LOGIN FORM -->

    <form class="form-vertical login-form" action="<?php echo U('users/regTodo');?>" method="post" enctype="multipart/form-data">

        <h3 class="form-title">欢迎注册环球空调</h3>

        <div class="alert alert-error hide">

            <button class="close" data-dismiss="alert"></button>

            <span>Enter any username and password.</span>

        </div>

        <div class="control-group">

            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

            <label class="control-label visible-ie8 visible-ie9">username</label>

            <div class="controls">

                <div class="input-icon left">

                    <i class="icon-user"></i>

                    <input class="m-wrap placeholder-no-fix" type="text" placeholder="用户名" name="username"/>

                </div>

            </div>

        </div>

        <div class="control-group">

            <label class="control-label visible-ie8 visible-ie9">Password</label>

            <div class="controls">

                <div class="input-icon left">

                    <i class="icon-lock"></i>

                    <input class="m-wrap placeholder-no-fix" type="password" placeholder="密　码" name="password"/>

                </div>

            </div>

        </div>

        <div class="control-group">
            <div class="controls">
                性　别: <input type="radio" name="sex" value="m"  /> 男&nbsp;|&nbsp;<input type="radio" name="sex" value="f" /> 女<br /><br />
                头  像: <input type="file" name="avatar" /><br /><br />
                邮　箱: <input  type="mail" name="email"style="width:142px;" /><br /><br />
                验证码: <input type="text" maxlength="4" name="code" style="width: 90px;"> <img src="<?php echo U('Users/yzm');?>" onclick="refreshImage(this);" style="cursor:pointer;position:relative;top:-5px;width:120px;height:35px;">
                <script type="text/javascript">
                    function refreshImage(obj){
                        //obj指代当前的对象
                        obj.src="index.php?m=Admin&&c=Users&&a=yzm&&t="+Math.random();	//t的作用防止浏览器缓存
                        return false;
                    }
                </script><br /><br />
            </div>

        </div>


        <div>

            <input type="submit" value="我要注册" class="btn green pull-right"><br/><br/>

        </div>

    </form>

    <!-- END LOGIN FORM -->

    <!-- BEGIN FORGOT PASSWORD FORM -->





    <!-- END REGISTRATION FORM -->

</div>

<!-- END LOGIN -->

<!-- BEGIN COPYRIGHT -->

<div class="copyright">

    2017 &copy; 环球空调.

</div>

<!-- END COPYRIGHT -->

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

<script src="/Application/Admin/View/media/js/jquery.validate.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="/Application/Admin/View/media/js/app.js" type="text/javascript"></script>

<script src="/Application/Admin/View/media/js/login.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script>

    jQuery(document).ready(function() {
//        App.init();
//        Login.init();
    });

</script>

<!-- END JAVASCRIPTS -->

<script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-37564768-1']);  _gaq.push(['_setDomainName', 'keenthemes.com']);  _gaq.push(['_setAllowLinker', true]);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script></body>

<!-- END BODY -->

</html>