<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻资讯</title>
    <link rel="stylesheet" href="/Application/Admin/View/css/style.css" type="text/css">
</head>
<body>
<div style="width: 1000px; margin: auto;">
    <div class="news_detail">
        <h5>
            <span>环球 推出全新环保节能家居空调</span>
            <div>
                <i>发布时间：<?php echo (date("Y-m-d H:i:s",$resone['createtime'])); ?></i>
            </div>
        </h5>
        <div class="news_detail_cont">
            <img src="/<?php echo ($resone['blogimage']); ?>" alt="">
            <p><?php echo (htmlspecialchars_decode($resone['contents'])); ?></p>
        </div>
    </div>

</div>
</body>
</html>