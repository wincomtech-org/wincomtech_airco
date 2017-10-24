<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta name="keywords" content="<?php echo ($Webarr[0]['keywords']); ?>">
    <meta name="description" content="<?php echo ($Webarr[0]['description']); ?>">
    <title><?php echo ($Webarr[0]['title']); ?></title>
    <link rel="stylesheet" href="/Application/Home/View/css/common.css" type="text/css">
    <link rel="stylesheet" href="/Application/Home/View/css/style.css" type="text/css">
    <script type="text/javascript" src="/Application/Home/View/js/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="/Application/Home/View/js/load.js"></script>
</head>
<body>
<!-- nav -->
<div class="navcontainer">
    <div class="w_contain">
        <div class="logo">
            <h1>
                <a href="/index.php"><img src="/<?php echo ($Logoarr[0]['logoimage']); ?>" title="网站LOGO" alt="网站LOGO"></a>
            </h1>
        </div>
        <div class="nav">
            <ul>
                <li><a current_name="Index" href="<?php echo U('index/index');?>">首页</a><img src="/Application/Home/View/image/ico1.png"></li>
                <li><a current_name="Product" href="<?php echo U('product/index');?>">产品中心</a><img src="/Application/Home/View/image/ico2.png"></li>
                <li><a current_name="Server" href="<?php echo U('server/index');?>">服务和支持</a><img src="/Application/Home/View/image/ico3.png"></li>
                <li><a current_name="Blogs" href="<?php echo U('blogs/index');?>">新闻资讯</a><img src="/Application/Home/View/image/ico4.png"></li>
                <li><a current_name="About" href="<?php echo U('about/index');?>">关于环球</a><img src="/Application/Home/View/image/ico5.png"></li>
                <li><a current_name="Contact" href="<?php echo U('contact/index');?>">联系我们</a><img src="/Application/Home/View/image/ico6.png"></li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        // nav
            $(".nav li").first().addClass("current");
            $('.nav li').each(function(){
                var current_name = $(this).find('a').attr('current_name');
                var name="<?php echo ($controller); ?>";
                if(current_name ==name){
                    $(this).addClass("current").siblings().removeClass("current");
                }
            })
    });
</script>
<!--<div class="m_nav">-->
    <!--<h1>-->
        <!--<a href="index.html"><img src="<?php echo ($Logoarr[0]['logoimage']); ?>" title="网站LOGO" alt="网站LOGO"></a>-->
    <!--</h1>-->
    <!--<img class="menu" src="/Application/Home/View/image/m_menu.png" title="导航" alt="导航">-->
    <!--<div class="m_cont">-->
        <!--<ul>-->
            <!--<li><a href="<?php echo U('index/index');?>">首页</a><img src="/Application/Home/View/image/ico1.png"></li>-->
            <!--<li><a href="<?php echo U('product/index');?>">产品中心</a><img src="/Application/Home/View/image/ico2.png"></li>-->
            <!--<li><a href="<?php echo U('server/index');?>">服务和支持</a><img src="/Application/Home/View/image/ico3.png"></li>-->
            <!--<li><a href="<?php echo U('blogs/index');?>">新闻资讯</a><img src="/Application/Home/View/image/ico4.png"></li>-->
            <!--<li><a href="<?php echo U('about/index');?>">关于环球</a><img src="/Application/Home/View/image/ico5.png"></li>-->
            <!--<li><a href="<?php echo U('contact/index');?>">联系我们</a><img src="/Application/Home/View/image/ico6.png"></li>-->
        <!--</ul>-->
    <!--</div>-->
<!--</div>-->
<!--引用百度地图API-->
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=R5mtSmf20YL040c12vfcwUToWvn9RNZk"></script>
<div class="clear"></div>
<!-- page -->
<div class="page_contain">
    <!-- top img -->
    <div class="page_top_img"><img src="/Application/Home/View/image/page.jpg" alt="" title=""></div>
    <div class="w_contain m_page">
        <!-- bread crumbs -->
        <div class="bread_crumbs">
            <span>当前位置：<a href="<?php echo U('index/index');?>">首页</a>><a href="<?php echo U('contact/index');?>">联系我们</a></span>
        </div>
        <!-- page title -->
        <h2 class="page_title"><img src="/Application/Home/View/image/column5.png" alt="" title=""></h2>
        <!-- page main content -->
        <div class="page_contact">
            <div class="contact_p">
                <p>全国统一服务热线：<span><?php echo ($Contactarr[0]['hot']); ?></span></p>
                <p>地址：<?php echo ($Contactarr[0]['address']); ?></p>
                <p>邮编：<?php echo ($Contactarr[0]['youbian']); ?></p>
                <p>电话：<?php echo ($Contactarr[0]['tel']); ?></p>
                <p>传真：<?php echo ($Contactarr[0]['fax']); ?></p>
                <p>邮箱：<?php echo ($Contactarr[0]['email']); ?></p>
            </div>
            <div class="w_contain m_page">
                <div class="map" id="map">
                </div>
            </div>

            <script type="text/javascript">
                window.onload=function(){
                    //创建和初始化地图函数：
                    function initMap(){
                        createMap();//创建地图
                        setMapEvent();//设置地图事件
                        addMapControl();//向地图添加控件
                        addMapOverlay();//向地图添加覆盖物
                    }
                    var lat=<?php echo ($Contactarr[0]['lat']); ?>;
                    var lng=<?php echo ($Contactarr[0]['lng']); ?>;
                    function createMap(){

                        map = new BMap.Map("map");
                        map.centerAndZoom(new BMap.Point(lng,lat),18);
                    }
                    function setMapEvent(){
                        map.enableScrollWheelZoom();
                        map.enableKeyboard();
                        map.enableDragging();
                        map.enableDoubleClickZoom()
                    }
                    function addClickHandler(target,window){
                        target.addEventListener("click",function(){
                            target.openInfoWindow(window);
                        });
                    }
                    function addMapOverlay(){
                        var markers = [
                            {content:"<?php echo ($Contactarr[0]['address']); ?>",title:"<?php echo ($Contactarr[0]['title']); ?>",imageOffset: {width:-46,height:-21},position:{lat:<?php echo ($Contactarr[0]['lat']); ?>,lng:<?php echo ($Contactarr[0]['lng']); ?>}}
                        ];
                        for(var index = 0; index < markers.length; index++ ){
                            var point = new BMap.Point(markers[index].position.lng,markers[index].position.lat);
                            var marker = new BMap.Marker(point,{icon:new BMap.Icon("http://api.map.baidu.com/lbsapi/createmap/images/icon.png",new BMap.Size(20,25),{
                                imageOffset: new BMap.Size(markers[index].imageOffset.width,markers[index].imageOffset.height)
                            })});
                            var label = new BMap.Label(markers[index].title,{offset: new BMap.Size(25,5)});
                            var opts = {
                                width: 200,
                                title: markers[index].title,
                                enableMessage: false
                            };
                            var infoWindow = new BMap.InfoWindow(markers[index].content,opts);
                            marker.setLabel(label);
                            addClickHandler(marker,infoWindow);
                            map.addOverlay(marker);
                        };
                    }
                    //向地图添加控件
                    function addMapControl(){
                        var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
                        scaleControl.setUnit(BMAP_UNIT_METRIC);
                        map.addControl(scaleControl);//地图比例尺
                        var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:1});
                        map.addControl(navControl);//地图缩放
                    }
                    var map;
                    initMap();
                };
            </script>
        </div>
    </div>
</div>
<!-- page end -->
<!-- top -->
<!-- top -->
<!---------kefu-------->
<link href="/Application/Home/View/css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Application/Home/View/js/top.js"></script>
<div class="main-im">
    <div id="open_im" class="open-im"></div>
    <div class="im_main" id="im_main">
        <div id="close_im" class="close-im"><a href="javascript:void(0);" title="点击关闭"></a></div>
        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($Contactarr[0]['qq']); ?>&site=qq&menu=yes" class="im-qq qq-a" title="在线QQ客服">
            <div class="qq-container"></div>
            <div class="qq-hover-c"><img class="img-qq" src="/Application/Home/View/images/qq.png"></div>
            <span> QQ在线咨询</span> </a>
        <div class="im-tel">
            <div>联系电话</div>
            <div class="tel-num"><?php echo ($Contactarr[0]['tel']); ?></div>
        </div>
        <div class="im-footer" style="position:relative">
            <div class="weixing-container">
                <div class="weixing-show">
                    <div class="weixing-txt">扫一扫关注<?php echo ($Contactarr[0]['title']); ?>微信公众帐号</div>
                    <img class="weixing-ma" src="/<?php echo ($Contactarr[0]['erweima']); ?>">
                    <div class="weixing-sanjiao"></div>
                    <div class="weixing-sanjiao-big"></div>
                </div>
            </div>
            <div class="go-top"><a href="javascript:;" title="返回顶部"></a> </div>
            <div style="clear:both"></div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $('#close_im').bind('click',function(){
            $('#main-im').css("height","0");
            $('#im_main').hide();
            $('#open_im').show();
        });
        $('#open_im').bind('click',function(e){
            $('#main-im').css("height","272");
            $('#im_main').show();
            $(this).hide();
        });
        $('.go-top').bind('click',function(){
            $(window).scrollTop(0);
        });
        $(".weixing-container").bind('mouseenter',function(){
            $('.weixing-show').show();
        })
        $(".weixing-container").bind('mouseleave',function(){
            $('.weixing-show').hide();
        });
    });
</script>

<!-- footer -->
<div class="footer clear">
    <div class="w_contain">
        <div class="contact1">
            <img src="/Application/Home/View/image/tele.png" alt="联系方式" title="联系方式">
            <span><?php echo ($Contactarr[0]['tel']); ?></span>
        </div>
        <div class="contact2_1">
            <img src="/<?php echo ($Contactarr[0]['erweima']); ?>" width="76px" height="77px" alt="微信二维码" title="微信二维码">
            <p class="rt">
                <span>地址：<?php echo ($Contactarr[0]['address']); ?></span>
                <span>电话：<?php echo ($Contactarr[0]['tel']); ?></span>
                <span>邮箱：<?php echo ($Contactarr[0]['email']); ?></span>
            </p>
        </div>
        <div class="contact2_2">
            <p class="link1">
                <a href="<?php echo U('index/index');?>">首页</a>
                <a href="<?php echo U('product/index');?>">产品中心</a>
                <a href="<?php echo U('server/index');?>">服务与支持</a>
                <a href="<?php echo U('blogs/index');?>">新闻资讯</a>
                <a href="<?php echo U('about/index');?>">关于环球</a>
                <a href="<?php echo U('contact/index');?>">联系我们</a>
            </p>
            <p class="link2">
                <img src="/Application/Home/View/image/link.png" alt="友链" title="友情链接">
                <?php if(is_array($Friendlinkarr)): $i = 0; $__LIST__ = $Friendlinkarr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo ($v['flink']); ?>" target="_blank"><?php echo ($v['fname']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </p>
        </div>
        <div class="clear">
            <p class="tc">
                <span>Copyright @ 2015-2018</span>
                <span>版权所有 </span>
                <span>环球空调有限公司</span>
                <span>皖ICP备10000000号</span>
                <span>技术支持：华创在线网络科技（北京）有限公司</span></p>
        </div>
    </div>
</div>
</body>
</html>